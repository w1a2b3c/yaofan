# 功能说明
- 样式采用layui,删除了图标及用不上的js,仅保留使用到的扩展，采用支付宝当面付支付，直接到个人账户，防止第三方跑路。
  疫情散发，日子难过，让天下没有难要的饭！
# 申请支付宝当面付
> 随便找个门头图
> 个人免签，营业执照是可选的，不上传的话限制单笔收款≤1000，单日收款≤5W，对于个人开发者足够了。
# 配置app/config.php
>支付宝官方提供了密钥生成工具，很简单，使用工具生成应用公钥和私钥，应用公钥设置到支付宝，应用私钥保存到本地。 
**配置以下变量：**
 - $appid  https://open.alipay.com  账户中心->密钥管理->开放平台密钥，填写添加了电脑网站支付的应用的APPID 
 - $notifyUrl pay.php文件访问地址   //付款成功后的异步回调地址 
 - $rsaPrivateKey  //支付宝私钥 
 - $alipayPublicKey     //支付宝公钥，账户中心->密钥管理->开放平台密钥，找到添加了支付功能的应用，根据你的加密类型，查看支付宝公钥
# 在线演示：
https://yaofan.mensd.top
## 请作者喝杯茶

<div style="display: flex; gap: 10px;">
  <img src="https://github.com/user-attachments/assets/e1fc6f8e-1f76-4a75-a478-7dd4830cdbca" alt="请作者喝杯茶1" style="max-width: 200px; height: auto;">
  <img src="https://github.com/user-attachments/assets/a1059b7d-1c8e-4908-9103-811e9557d0ee" alt="请作者喝杯茶2" style="max-width: 200px; height: auto;">
</div>
