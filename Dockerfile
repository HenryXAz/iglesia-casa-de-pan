FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

RUN apk update

RUN apk add npm

RUN npm install

RUN npm run build

CMD ["/start.sh"]


#FROM node:20.15.1-alpine AS build
#
#WORKDIR /build
#
#COPY . .
#
#RUN apk update
#
#RUN npm install
#
#RUN npm run build
#
#FROM richarvey/nginx-php-fpm:3.1.6
#
#COPY --from=build /build /var/www/html
#
#CMD ["/start.sh"]
