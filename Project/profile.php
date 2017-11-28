<?php
session_start();
if(empty($_SESSION['login_userid'])){
  header('Location:login.php');
  exit(); 
}
require_once("connect_members.php");

$user_real_name = $user_mail_address = $user_sex = $user_phone = $user_height = $user_weight = "";
$user_real_name_err = $user_mail_address_err = $user_sex_err = $user_phone_err = $user_height_err = $user_weight_err = "";

$user_sexes = array(
  'male' => '男性',
  'female' => '女性',
  'others' => '其他'
);
$_SESSION['update_success'] = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(empty(trim($_POST['user_real_name'])))
  {
    $user_real_name_err = "請輸入你的姓名";
  }
  else
  {
    if(!($_SESSION['user_real_name']==trim($_POST['user_real_name'])))
    {
      $user_real_name = trim($_POST['user_real_name']);
      $_SESSION['user_real_name'] = $user_real_name;
    }
  }

  if(empty(trim($_POST['user_mail_address'])))
  {
    $user_mail_address_err = "請輸入你的信箱";
  }
  else
  {
    if(!($_SESSION['user_mail_address'] == (trim($_POST['user_mail_address'])))){
      $sql = "SELECT id FROM users_information WHERE mail_address = ?";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, 's', $param_mail_address);
        $param_mail_address = trim($_POST['user_mail_address']);
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1){
            $user_mail_address_err = "此信箱已被採用";
          }
          else{
            $user_mail_address = trim($_POST['user_mail_address']);
            $sql2 = "UPDATE users_information SET mail_address = '$user_mail_address' WHERE userid=?";
            if($stmt2 = mysqli_prepare($link,$sql2))
            {
              mysqli_stmt_bind_param($stmt2, 's', $param_userid2);
              $param_userid2 = $_SESSION['login_userid'];
              if(mysqli_stmt_execute($stmt))
              {
                $_SESSION['user_mail_address'] = $user_mail_address;
                $_SESSION['update_success'] = true;
              }
            }
            mysqli_stmt_close($stmt2);
          }
        }
        else{
          echo ("抱歉...請再次輸入你的信箱");
        }
      }
      mysqli_stmt_close($stmt);
    }
  }


  if(empty($_POST['user_sex'])){
    $user_sex_err = "請選擇性別";
  }
  else{
    $user_sex = $_POST['user_sex'];
  }
  if(empty(trim($_POST['user_phone']))){
    $user_phone_err = "請輸入連絡電話";
  }
  else{
    if(!(($_SESSION['user_phone']) == (trim($_POST['user_phone']))))
    {
      $user_phone = (trim($_POST['user_phone']));
      $sql = "UPDATE users_information SET user_phone = '$user_phone' WHERE userid = ?";
      if($stmt = mysqli_prepare($link,$sql))
      {
        mysqli_stmt_bind_param($stmt, 's', $param_userid);
        $param_userid = $_SESSION['userid'];
        if(mysqli_stmt_execute($stmt))
        {
          echo("成功更新電話");
          $_SESSION['user_phone'] = $user_phone;
        }
      }
      mysqli_stmt_close($stmt);
    }
  }
  if(empty(trim($_POST['user_height']))){
    $user_height_err = "請輸入你的身高";
  }
  else{
    if(!(($_SESSION['user_height']) == (trim($_POST['user_height']))))
    {
      $user_height = trim($_POST['user_height']);
      $sql = "UPDATE users_information SET user_height = '$user_height' WHERE userid=?";
      if($stmt = mysqli_prepare($link,$sql))
      {
        mysqli_stmt_bind_param($stmt,'s',$param_userid);
        $param_userid = $_SESSION['userid'];
        if(mysqli_stmt_execute($stmt))
        {
          echo("更新身高成功!");
          $_SESSION['user_height'] = $user_height;
        }
      }
      mysqli_stmt_close($stmt);
    }
  }
  if(empty(trim($_POST['user_weight']))){
    $user_weight_err = "請輸入你的體重";
  }
  else{
    if(!(($_SESSION['user_weight']) == (trim($_POST['user_weight']))))
    {
      $user_weight = trim($_POST['user_weight']);
      $sql = "UPDATE users_information SET user_weight = '$user_weight' WHERE userid=?";
      if($stmt = mysqli_prepare($link,$sql))
      {
        mysqli_stmt_bind_param($stmt,'s',$param_userid);
        $param_userid = $_SESSION['userid'];
        if(mysqli_stmt_execute($stmt))
        {
          echo("更新體重成功!");
          $_SESSION['user_weight'] = $user_weight;
        }
      }
      mysqli_stmt_close($stmt);
    }
  }
}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="custom_css/profile_css.css" rel="stylesheet">
  <title>PULSER 2.0</title>

</head>


<body>
  <div>
    <div class="container-fluid topnav_css">
      <div class="container-fluid">      
        <ul class="nav navbar-nav navbar-left">
          <li><a href="index.php"><span class="fa fa-home"></span></a></li>
          <li><label class="title_css">PULSER 2.0</label></li>
        </ul>

        <ul class="nav navbar-nav navbar-right title_right">
          <li>
            <a href="dash4.php">
              <i class="fa fa-tachometer" aria-hidden="true"></i>
              <label>儀錶面板</label>
            </a>
          </li>
          <li>
            <a href="profile.php">
              <i class="fa fa-user-o" aria-hidden="true"></i>
              <label><?php echo($_SESSION['login_userid']. " " .($_SESSION['user_real_name']));?></label>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <label>登出</label>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>



  <div class="container">
    <div id="sidebar-wrapper">
      <div style="height:20px;"></div>

      <div class="panel panel-red">
        <div class="panel-heading"></div>
        <div class="panel-footer">
          <span class="pull-left">
            <div class="panel_red_footer_account">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <label class="panel_red_label">歡迎 @<?php echo($_SESSION['login_userid']);?></label>
            </div>
          </span>
          <div class="clearfix"></div>
        </div>
      </div>

      <div>
        <ul class="sidebar-nav">
          <li class="profile_siderbar_title text-center"><label class="">個人資訊設定</label></li>
          <li><a href="password_change.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>修改密碼</a></li>
          <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>隱私與安全</a></li>
          <li><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i>裝置設定</a></li>
          <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i>說明</a></li>
          <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>關於我們</a></li>
          <li><a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i>聯絡我們</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div class="panel">
        <div class="panel-footer sidebar_footer">
          <span class="pull-left">
            <div>
              <i class="fa fa-cc" aria-hidden="true"></i>
              <label>PULSER 2.0@2017</label>
            </div>
          </span>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>




    <div id="page_wrapper">
      <div class="panel">

        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-12 text-left heading_padding">
              <div class="heading_title"><label>個人資訊<label></div>
              </div>
            </div>
          </div>

          <div class="main_page_content panel-footer">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
             <a class="fragment"><span id='close'>x</span><label>以更新成功個人資訊!</label></a>

              <div class="row">
                <div class="col-md-5 form-group <?php echo (!empty($user_real_name_err)) ? 'has-error' : ''; ?>">
                  <label>使用者姓名</label>
                  <input type="text" name ="user_real_name" class="form-control" value="<?php echo($_SESSION['user_real_name']);?>">
                  <span class="help-block"><?php echo $user_real_name_err; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 form-group <?php echo (!empty($user_mail_address_err)) ? 'has-error' : ''; ?>">
                  <label>信箱</label>
                  <input type="text" name="user_mail_address" class="form-control" value="<?php echo($_SESSION['login_user_mail_address']);?>">
                  <span class="help-block"><?php echo $user_mail_address_err; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 form-group <?php echo (!empty($user_sex_err)) ? 'has-error' : ''; ?>">
                  <label>性別</label>
                  <select class="form-control" id="gender" name="user_sex">
                    <option value="男性" <?php if($user_sexes['male'] == '男性'): ?> selected="selected"<?php endif; ?>>男性</option>
                    <option value="女性" <?php if($user_sexes['female'] == '女性'): ?> selected="selected"<?php endif; ?>>女性</option>
                    <option value="其他" <?php if($user_sexes['others'] == '其他'): ?> selected="selected"<?php endif; ?>>其他</option>

                  </select>
                  <span class="help-block"><?php echo $user_sex_err; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 form-group <?php echo (!empty($user_phone_err)) ? 'has-error' : ''; ?>">
                  <label>連絡電話</label>
                  <input type="text" name = "user_phone" class="form-control" value="<?php echo($_SESSION['user_phone']);?>">
                  <span class="help-block"><?php echo $user_phone_err; ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-10 form-group">
                  <div class="row">

                    <div class="col-md-4 form-group <?php echo (!empty($user_weight_err)) ? 'has-error' : ''; ?>">
                      <label>身高</label>
                      <input type="text" class="form-control" name="user_height" value="<?php echo($_SESSION['user_height']);?>">
                      <span class="help-block"><?php echo $user_weight_err; ?></span>
                    </div>

                    <div class="col-md-4 form-group <?php echo (!empty($user_height_err)) ? 'has-error' : ''; ?>">
                      <label>體重</label>
                      <input type="text" class="form-control" name="user_weight" value="<?php echo($_SESSION['user_weight']);?>">
                      <span class="help-block"><?php echo $user_height_err; ?></span>
                    </div>

                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-10 form-group">
                  <input type="hidden" name="refer" value=" <?php echo (isset($_GET['refer'])) ?$_GET['refer']:'profile.php';?>">
                  <button type="submit" class="btn submitButton">修改個人資訊</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>

  </body>

  <script type="text/javascript">
    window.onload = function(){
      document.getElementById('close').onclick = function(){
        this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
        return false;
      };
    };
  </script>


  </html>
