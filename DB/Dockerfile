FROM mysql

ENV MYSQL_ROOT_PASSWORD fakepassword
ENV MYSQL_DATABASE Database
ENV MYSQL_USER User
ENV MYSQL_PASSWORD fakepassword

EXPOSE 3306

COPY ./sql /docker-entrypoint-initdb.d/