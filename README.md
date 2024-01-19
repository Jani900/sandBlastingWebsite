# On the local machine:
# 1.1 Navigate to the project's root directory and build the Docker image:
docker build -t sandblasting .

# 1.2 Export the Docker image:
docker save -o /tmp/sandblasting.tar sandblasting:latest

# 1.3 Upload the exported Docker image to the server
scp /tmp/sandblasting.tar root@algotech.co.nz:/tmp

# 1.4 Delete local temporary files
rm /tmp/sandblasting.tar

# 1.5 Connect to the server
ssh root@algotech.co.nz

# On the remote server:
# 2.1 Stop the currently running Docker container for the website
docker stop sandblasting

# 2.2 Remove the old Docker container and Docker image
docker rm sandblasting
docker rmi sandblasting

# 2.3 Load the Docker image
docker load -i /tmp/sandblasting.tar

# 2.4 Run Docker
sh /usr/local/bin/init_docker/init_sandblasting.sh

# 2.5 Disconnect form server
exit
