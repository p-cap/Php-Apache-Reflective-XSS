#!/bin/bash

# remove an container
# -f force the removal of a running container (uses SIGKILL)
echo "--- Removing existing container ---"
docker rm -f pcap-cwe
echo -e "\n"

# builds a docker image from Dockerfile
# the --tag will generate the name of the image if there is no tag mentioned
# the . means the current working directy which sets it as the root directory 
# for the build
# && chains the next command meaning the first command needs to run first
# the backslash concatenates the current line wit the next line
echo "--- Building new image named cwe-php ---"
docker build --tag=cwe-php .  && \
echo -e "\n"

# run creates the container
# --name is responsible for naming the container
# --rm automatically removes the container
# -t allocates a pseudo-tty
# -i Keep STDIN open even if not attached 
# -d  Run container in background and print container ID
# -p Publish a container's port(s) to the host <Host Port: Container Port>
echo "--- Creating a new container ---"
docker run --name=pcap-cwe --rm -p8080:80 -v ${PWD}/site:/var/www/html -dit cwe-php
echo -e "\n"

echo "--- Please connect using http://localhost:8080 ---"
echo -e "\n"
echo "--- NOTE: To maximize experience, please use Chrome as your browser ---"
echo -e "\n"
