<?php
error_reporting(0);
session_start();
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__))."/");
define('ROOT_PATH',str_replace('app/','',BASE_PATH));
define('DB_TYPE', 'sqlite'); //数据库类型
define('DB_NAME', ROOT_PATH.'app/db/e99dba9e1c.db'); //上线请更改数据库地址
define('TOKEN', '0e6d15df8781e');
/*** 请填写以下配置信息 ***/
$appid = '  ';  //https://open.alipay.com 账户中心->密钥管理->开放平台密钥，填写添加了电脑网站支付的应用的APPID
$notifyUrl = '';     //付款成功后的异步回调地址
$signType = 'RSA2';			//签名算法类型，支持RSA2和RSA，推荐使用RSA2
$rsaPrivateKey='exGWzXe/bRON7NCOd1nC/3xN2IbAgMBAAECggEAEeq5cg19V98N65IXW8+OEHSPm3YminUC//PLVaKWCLUq2Ls3a4U4AaigtsLQ5Lkbdpkp7a/LV5WNK1vXGYabDIujm/g7Jp4ofC0Wct7EIdqS72QY1gXIwNNkW0PRTThddR9XzDkyrnRMk2/p0A11DVSr+S3/Fv5tDBlKQTPUvnEzEEyfxAv6Ctj+lAwKTUxiweBWreGN+JzTLLnjW8Gp1yuLaIIHEXAeMLvp6TVvpjholVXdTTjVE6qC6jHPtOho94glM8wq3HpT8FVsPQ+UfgAw3PJv4c4xj1EjqvgxxWZpDW7NOYgCro7KXcK5bIliXXmMcs1GzXFgzK7qmX+DuQKBgQD+jCL1GEXXssxVhY4CJtE9hV7Vj7Dr6U1hgwofAQOBuymGt8M0+gcJ1Lg1+5oJ0mmzj3kSmlAYWc5kS54TwktIqjE5R5iT+SPEMj67p58wGEbCG/3pEbKcdAymqHjAn0Ojz2H5laE13T3Hl34j+dN8shtpIwWA9KgYvdtx+lIWBQKBgQCYAQ75SJiLfH2mwvG0xokCteACa4MQAGBUu/23l6njISIefsiRof5bsUtavqTJXOjIYO/f2rB3kv3jihEL9vpizb7my08HQ8ef+wYlBrZvnCUm1rQ3vRAQ5xreBTCD/l7l2x9vsisZJGsRKMnOc8gdHy3SKMy4D/G3BFe/6k3xnwKBgGE2md8q7vmKwnji8bImqwCo3+gF4ZanWjMkfYgLthAkr55Qrg+ccXWytMuBFHotzsqRv7Z4EqDKI4WwT2XSbTgKL5RloILawmsamVTHlocirltRn24UoTcZJv+7FarS6F02RX+xQok0vnRsifMpZTiZONi1VFPEnDIeyCFGbXUVAoGAXt+iQfOOytkL8C8S//s+/wMX60rBhhZGCf1AMfwmnE5M5m3JsCRFB2QUnXIKlmg4HwFqFvV/WVLUxtWhKC+iPlMeyRyymd0zVuYuAqQ68FSsV56A451MztAAU/03N9tnzd3DtEqnXcz+SrqDoylfCNYyGk8+38+L1eiPAIk01w8CgYABjFxLonQxDqLc21QUusaHawU0lCsFFR9EQF6N3MM07MDNe3nxFuEa3ASTdvawuIgX+QMMdJNntfgCQbU2qopz2n36I2ZeR0gbZYAggKiG56glEkTYTv4SqYgRAYk7r0D0MzNpwK+fNw58CC3JKc80/tHgCHz3WAzhSFuWkKJlww==';	
//支付宝公钥，账户中心->密钥管理->开放平台密钥，找到添加了支付功能的应用，根据你的加密类型，查看支付宝公钥
$alipayPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnIcdaknU1XfHy/jjJv1Q1RK5iWIR/rwk7PnSTEVR7Eth1dOkYYAt1TrCVZ7dH6keIFi5KeoRjxfPaoV8pR3zcYAiYkwfoTO4mEuqR/YQQxq08E84nK07twZrHwDmQrO+TwC8o/uB1TWgt4w0uNyGHVqjqdEVpjxRZrB8gAamtX/oXkvos3LtFQzES0vlyZQ6TKdvgWQLQmsDgjb68Z1F4/VbctaV+kxbBY2Fjf7WoJse6YaapljBjY8FbpeLcBDayviDXVdViDUMF9ow6uFMD3W2V5OzP2rgS6KrG/8mDeij98HG97L4TpaV9Y9zk7+tI88CWcKINZlix+STgP3UBQIDAQAB';
