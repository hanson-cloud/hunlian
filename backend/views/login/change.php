<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>婚恋网后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="assets/99fb244b/jquery.js"></script>
</head>
<body>

        <div class="result-wrap">
            <div class="result-content">
                <form action="?r=login/update" method="post">
                <input type="hidden" value="<?php echo $id;?>" name="id">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>新密码：</th>
                                <td>
                                    <input class="common-text required" id="admin_pwd" name="admin_pwd" size="50" value="" type="password">
                                </td>
                            </tr>

                            <tr>
                                <th><i class="require-red">*</i>重复新密码：</th>
                                <td>
                                    <input class="common-text required" id="admin_pwd2" name="admin_pwd2" size="50" value="" type="password">
                                </td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>

                        </tbody></table>
                </form>
            </div>
        </div>

    <!--/main-->
</body>
</html>
<script>
    
</script>