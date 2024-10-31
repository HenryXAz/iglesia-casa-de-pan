FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

RUN apk update

RUN apk add npm

RUN npm install

RUN npm run build

CMD ["/start.sh"]


