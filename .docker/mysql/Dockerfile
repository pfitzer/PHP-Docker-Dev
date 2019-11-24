FROM oraclelinux:7-slim

ARG MYSQL_ROOT_PASSWORD
ARG MYSQL_DATABASE
ARG MYSQL_USER
ARG MYSQL_PASSWORD

ARG SERVICE_DIR="./mysql"
ARG TARGET_MYSQL_VERSION=8.0.18
ARG MYSQL_SERVER_PACKAGE=mysql-community-server-minimal-$TARGET_MYSQL_VERSION
ARG MYSQL_SHELL_PACKAGE=mysql-shell-$TARGET_MYSQL_VERSION

ENV MYSQL_ROOT_PASSWORD ${MYSQL_ROOT_PASSWORD}
ENV MYSQL_DATABASE ${MYSQL_DATABASE}
ENV MYSQL_USER ${MYSQL_USER}
ENV MYSQL_PASSWORD ${MYSQL_PASSWORD}

# Install server
RUN yum install -y https://repo.mysql.com/mysql-community-minimal-release-el7.rpm \
      https://repo.mysql.com/mysql-community-release-el7.rpm \
  && yum-config-manager --enable mysql80-server-minimal \
  && yum install -y \
      $MYSQL_SERVER_PACKAGE \
      $MYSQL_SHELL_PACKAGE \
      libpwquality \
  && yum clean all \
  && mkdir /docker-entrypoint-initdb.d

VOLUME /var/lib/mysql

COPY ${SERVICE_DIR}/conf.d/my.cnf /etc/my.cnf
COPY ./.shared/scripts/configure_mysql_server.sh /bin/entrypoint.sh
COPY ./.shared/scripts/mysql_healthcheck.sh /bin/healthcheck.sh
RUN chmod +x /bin/entrypoint.sh \
	&& chmod +x /bin/healthcheck.sh

ENTRYPOINT ["/bin/entrypoint.sh"]
HEALTHCHECK CMD /bin/healthcheck.sh
EXPOSE 3306
CMD ["mysqld"]
