#!/bin/bash

USER_NAME=testuser
PASSWD=testpass
CRYPTPASS=`openssl passwd -crypt ${PASSWD}`

echo "${USER_NAME}:${CRYPTPASS}" >> /etc/nginx/.htpasswd