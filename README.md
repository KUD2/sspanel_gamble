# SSPanel Bandwidth Gambling API
SSPanel bandwidth gambling PHP API for Koeki Bot

### Variables to change: 
Line 20: API Key (For Verification)
```
$ray = array("APIKEY");
```
Line 66 and 68: MYSQL Root Password (For Connection)
```
$conn=mysqli_connect("localhost","root","root_password","database_name");
```
https://[link]/api.php?key=[APIKEY]&id=[UserTelegramID]&change=[DataChange(MB)]method=[increase/decrease]
