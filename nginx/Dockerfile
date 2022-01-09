FROM nginx:latest

COPY default.conf /etc/nginx/conf.d/
COPY gen_htpasswd.sh /etc/nginx/

RUN apt-get update
RUN apt-get install -y openssl
RUN chmod 755 /etc/nginx/gen_htpasswd.sh
RUN /etc/nginx/gen_htpasswd.sh
RUN chmod 444 /etc/nginx/.htpasswd