# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cpereira <cpereira@student.42sp.org>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/04/23 19:24:25 by cpereira          #+#    #+#              #
#    Updated: 2020/04/26 00:02:09 by cpereira         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

#download the OS
FROM debian:buster



# UPDATE
RUN apt-get update
RUN apt-get upgrade -u
RUN apt-get -y install wget


############## NGINX ###############
#INSTALA
RUN apt-get -y install nginx

#copia os arquivos de configuração para a pasta localhost
COPY ./srcs/nginx.conf /etc/nginx/sites-available/default



############# FIM NGINX ###########

############ PHP E MYSQL #############
#instala o MYSQL - mariadb]
RUN apt-get -y install mariadb-server

#instala o PHP e suas extensões (básicas)
RUN apt-get -y install php7.3 php-mysql php-fpm php-cli php-mbstring

############ FIM PHP E MYSQL #########

#Cria pasta onde será armazenado as paginas
RUN mkdir /var/www/localhost


################ PHPMYADMIN #############
# baixa
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.1/phpMyAdmin-4.9.1-english.tar.gz

#Descompacta o arquivo
RUN tar -xf phpMyAdmin-4.9.1-english.tar.gz
#remove o arquivo 
RUN rm -rf phpMyAdmin-4.9.1-english.tar.gz

#move a pasta criada para a pasta dentro do servidor
RUN mv phpMyAdmin-4.9.1-english /var/www/localhost/phpmyadmin

#move os arquivos de configuração do PHP para dentro da pasta do servidor
COPY ./srcs/config.inc.php /var/www/localhost/phpmyadmin/
COPY ./srcs/index.php /var/www/localhost
COPY ./srcs/info.php /var/www/localhost

#muda as permissões da pasta phpmyadmin
RUN chown -R www-data:www-data /var/www/localhost/phpmyadmin

# CRIA A BASE DE DADOS QUE O WORDPRESS IRÁ USAR
#RUN service mysql start
CMD echo "CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" | mysql -p -u root 
CMD  mysqladmin --user=root password ""

################## FIM PHPMYADMIN ########


################# WORDPRESS ##############
# BAIXA O WORDPRESS
RUN wget https://br.wordpress.org/wordpress-5.3.2-pt_BR.tar.gz

# Descompacta  O WORDPRESS e remove o compactado
RUN tar -xf wordpress-5.3.2-pt_BR.tar.gz 
RUN rm -rf wordpress-5.3.2-pt_br.tar.gz


# copia o arquivo de configuração do Wordpress para a pasta
COPY ./srcs/wp-config.php wordpress/wp-config.php

# mova a pasta do wordpress para dentro da pasta do servidor
RUN mv wordpress /var/www/localhost/

# cria a base de dados para o WORDPRESS 


############### FIM WORDPRESS ############

############## SSL #######################

#instala SSL
RUN apt-get install -y openssl 

# configura SSL
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj '/C=BR/ST=SP/O=42/CN=cpereira' -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

############### FIM SSL #################

# CRIA A BASE DE DADOS QUE O WORDPRESS IRÁ USAR

COPY ./srcs/start.sh /var/

CMD bash /var/start.sh

EXPOSE 80 443

