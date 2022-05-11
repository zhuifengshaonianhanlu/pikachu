FROM mattrayner/lamp:latest-1604-php5

COPY . /app/

CMD ["/run.sh"]
