We run a deep learnning work use Paddle:
http://www.paddlepaddle.org/

We reformed the seqToseq algorithm from this:
http://www.paddlepaddle.org/doc/demo/text_generation/text_generation.html

We use the data: corpus from 120 thousand first instance criminal judgment
http://wenshu.court.gov.cn/

Put run.php into crontab, just like this on Ubuntu:
crontab -e
*/1 * * * * php /var/www/html/seqToseq/run.php
