FROM mattrayner/lamp:latest-2004-php7
LABEL maintainer="8023 - i@8023.moe"
LABEL description="pikachu on php7 with expect @230613"
COPY . /app/
RUN apt-get update -y &&\
    apt-get install -y php7.4-dev php-pear expect tcl-dev tcl-expect-dev &&\
    ln -s /usr/include/tcl8.6/tcl.h /usr/include/tcl.h &&\
    ln -s /usr/include/tcl8.6/tclDecls.h /usr/include/tclDecls.h &&\
    ln -s /usr/include/tcl8.6/expect_tcl.h /usr/include/expect_tcl.h &&\
    ln -s /usr/include/tcl8.6/tclPlatDecls.h /usr/include/tclPlatDecls.h &&\
    pecl channel-update pecl.php.net && pecl install expect &&\
    sed -i '/AllowNoPassword/s/false/true/g' /var/www/phpMyAdmin-5.1.1-all-languages/config.inc.php ;\
    sed -i '/display_startup_errors/s/Off/On/g' /etc/php/7.4/apache2/php.ini ;\
    sed -i '/allow_url_include/s/Off/On/g' /etc/php/7.4/apache2/php.ini ;\
    sed -i '/allow_url_fopen/s/Off/On/g' /etc/php/7.4/apache2/php.ini ;\
    sed -i '/display_errors/s/Off/On/g' /etc/php/7.4/apache2/php.ini ;\
    sed -i '$a extension=expect.so' /etc/php/7.4/apache2/php.ini ;\
    sed -i '/DBPW/s/root//g' /app/pkxss/inc/config.inc.php ;\
    sed -i '/DBPW/s/root//g' /app/inc/config.inc.php ;\
    phpenmod expect && \
    apt-get remove -y php7.4-dev tcl-dev tcl-expect-dev &&\
    apt-get autoremove -y && apt-get clean -y && rm -rf /var/lib/apt/lists/*
EXPOSE 80
CMD ["/run.sh"]