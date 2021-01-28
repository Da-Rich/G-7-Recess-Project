#include "client.h"

#define PATIENT_FILE "patients.txt"

void print_instructions(){
	char* instructions = "\
		\nInstructions for this cli-program:\n\
		Note that dates should be entered in the format DDMMYYYY\n\
		For example 01011990 for 1st/Jan/1990\n\
		Enter commands and arguments as follows depending on your needs\n\
		Addpatient patient_name, date, gender, category -submits one patient entry\n\
		Addpatient filename.txt				-submits patient entries in a file\n\
		Check_status					-checks status of district file\n\
		Done						-closes individual session, you will need to submit your ID after this\n\
		Quit						-closes the cli-program\n";
	printf("%s\n", instructions);
}

int process_input(char* input){
	int len = strlen(input);
	if(len == 0){
		printf("Please enter valid input");
		return -1;
	}
	while(input[len-1] == '\n'){
		input[len-1]='\0';
		len--;
	}
	return 0;
}

void scan_str(char* in, char* name, char* date, char* gender, char* status){
        int len = strlen(in);
        if(len == 0)
                return;
        int shift=0;
        char* strings[4];
        strings[0] = name;
        strings[1] = date;
        strings[2] = gender;
        strings[3] = status;
        char* start = in;
        char* end;
        char* g_end = in+len;
        for(int i=0; i<len-1; i++){
                if(in[i+1] == ','){
                        end = in+i+1;
                        strncpy(strings[shift],start, end-start);
                        shift++;
                        start = end+2;
                }
                if(shift == 3){
                        strncpy(strings[shift],start,g_end-start);
                        return;
                }
        }

        if(start == in){
                strncpy(name,in,len);
                return;
        }
}

int process_command(char* command){
	int client_sock = create_socket();
	connect_to_server(client_sock);
	FILE *patient_file = fopen(PATIENT_FILE,"a+");
	if(strlen(command) > 0){
		
		if(strncmp(command,"Addpatient",10) == 0){
			char* name = (char*)malloc(30);
			char* date = (char*)malloc(8);
			char gender, confirm;
			char* category = (char*)malloc(3);/* +ve, -ve*/
			memset(name,0,30);
			memset(date,0,8);
			memset(category,0,3);
			memset(&gender,0,1);
			memset(&confirm,0,1);
			scan_str(command+11,name, date, &gender, category);
			if(strlen(date) == 0){
				/* input from file: name=filename.txt */
				FILE* input_file = fopen(name,"r");
				if(input_file == NULL){
					printf("Unable to read file %s\n", name);
					print_instructions();
				}else{
					if(initiate_data_transfer("2", client_sock) < 0){
						fclose(input_file);
						goto ending;
					}
					char buffer[1024];
					while(fgets(buffer,1024,input_file) != NULL){
						fprintf(patient_file,"%s",buffer);
						if(send(client_sock, buffer, strlen(buffer),0) < 0){
							printf("Error sending file, please restart program and try again \n");
							fclose(input_file);
							exit(-1);
						}else if(recv(client_sock, &confirm,  1, 0) < 0){
							printf("Error receiving confirmation\n");
							fclose(input_file);
							exit(-1);
						}
					}
					printf("Data sent and saved successfully\n");
					bzero(buffer, 1024);
					fclose(input_file);
				}
			}else if(strlen(&gender) != 0 && strlen(category) != 0 ){
				/*input for single parent:makesure to check input format */
				if(initiate_data_transfer("1", client_sock) < 0){
						goto clean_up;
				}
				
				size_t sent = send(client_sock, command+11, strlen(command)+11, 0);				
				if(sent < 0){
					perror("data transfer");
					close(client_sock);
                    fclose(patient_file);
					exit(-1);
				}else{
					size_t recvd = recv(client_sock,&confirm,1,0);/* store server confirmation in gender */
					if(recvd <= 0 || confirm != '1'){ /*check for confirmation from server */
						perror("reception confirmation\n");
						close(client_sock);
						fclose(patient_file);
						exit(-1);
					}
				}
				fprintf(patient_file,"%s\n",command+11);

			}else{
				/* input error */
				printf("Error parsing command\n");
				print_instructions();
			}
			clean_up:
				memset(name,0,30);
				memset(date,0,8);
				memset(&gender,0,1);
				memset(category,0,3);
				free(name);
				free(date);
				free(category);
		}else if(strncmp(command,"Check_status",12) == 0){
		}else if(strncmp(command,"Done",4) == 0){
			return 1;
		}else if(strncmp(command,"Quit",4) == 0){
			close(client_sock);
			fclose(patient_file);
			printf("Goodbye\n");
			exit(0);
		}else if(strncmp(command,"Search",6) == 0){

		}else{
			print_instructions();
			printf("Command > ");
			return -1;
		}
	}
	ending:
		closesocket(client_sock);
		clear_win_sock();
		printf("Command > ");
		fclose(patient_file);
		return 0;
}


int main(){
#ifdef _WIN32
	WSADATA wsa_data;
	int res = WSAStartup(MAKEWORD(2,2), &wsa_data);
	if(res != 0){
		perror("WSAStartup");
		exit(-1);
	}
#endif

	char district[30];
	char officer_id[15];
	printf("Welcome to the Covid-19 Report CLI System\nPlease enter your district: ");
	fgets(district, 30, stdin);
	while(process_input(district) < 0){
		printf("Please Enter your District: ");
		fgets(district, 30, stdin);
	}


	char user_input[USER_BUF_SIZE];

	while(1){
		/* client action happens here 
		 * prompt user for requests, 
		 * send request to server and await confirmation
		 * Accepted commands:
		 * 	AddPatient,
		 *
		 * */
		printf("Please enter your ID: ");
		fgets(officer_id,15,stdin);

		while(process_input(officer_id) < 0){
			printf("Please enter your ID: ");
			fgets(officer_id,15,stdin);
		}

		printf("Access by Officer ID: %s at District: %s\n", officer_id, district);
		print_instructions();
		printf("Command > ");
		fgets(user_input, USER_BUF_SIZE, stdin);
		while(process_input(user_input) < 0){
			printf("Command > ");
                	fgets(user_input, USER_BUF_SIZE, stdin);
		}

		int processed;
		while((processed = process_command(user_input)) != 1){
			fgets(user_input, USER_BUF_SIZE, stdin);
			while(process_input(user_input) < 0){
				printf("Command > ");
                fgets(user_input, USER_BUF_SIZE, stdin);
			}
		}
	}

	printf("Goodbye\n");
	system("pause");
	return (0);
}
