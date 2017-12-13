<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>管理账号列表</title>
<link href="<?php echo base_url(); ?>styles/share.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>styles/index.css" rel="stylesheet" type="text/css">
 <link href="<?php echo base_url(); ?>styles/my.css" rel="stylesheet" type="text/css">


<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>js/msgbox.js"></script>


<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<link href="<?php echo base_url(); ?>styles/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>styles/style.css" rel="stylesheet">
<style>
.header
{
	height:80px;
}

body
{
	font-family:"微软雅黑","宋体";
}

.form-group label
{
	width:100px;
}

.col-sm-10 {
    width: 70%;
}
</style>

<script type="text/javascript">
//添加用户
function add_manager() {
    var user_name = $("#add_username").val();
    var passwd    = $("#add_passwd").val();
	var passwd1    = $("#add_passwd1").val();
    var status    = $("#select_status").val();

	if(user_name == "")
	{
		alert("用户名不能为空！");
		return false;
	}
	
	if(passwd == "")
	{
		alert("密码不能为空！");
		return false;
	}
	
	if(passwd1 == "")
	{
		alert("确认密码不能为空！");
		return false;
	}
	
	if(passwd != passwd1)
	{
		alert("两次密码输入不一致，请重新输入！");
		return false;
	}

    if(user_name != "" && passwd !="" && status != "" ) {
        $.post('<?php echo site_url("admin_manage/admin_manage/add_manager"); ?>',{'user_name':user_name,'passwd':passwd,'status':status},function(result) { 
			if(result == 1)
			{
				alert("添加成功");
			}
			else
			{
				alert("添加失败");
			}
            window.location.href = "<?php echo site_url('admin_manage/admin_manage'); ?>";
        });  
    }
    else {
		alert("输入信息不完整");
        return false;
    }
}

//修改用户
<?php $admin_num = 1;if(!empty($admin_list['user_list'])){foreach($admin_list['user_list'] as $data): ?>
function edit_manager<?php echo $admin_num;?>() {
    var user_name = $("#edit_username<?php echo $admin_num;?>").val();
    var passwd   = $("#edit_passwd<?php echo $admin_num;?>").val();
	var passwd1   = $("#edit_passwd1_<?php echo $admin_num;?>").val();
    var status   = $("#edit_status_<?php echo $admin_num;?>").val();


	if($("#if_change_passwd<?php echo $admin_num;?>").is(':checked'))
	{
		if(passwd == "")
		{
			alert("密码不能为空！");
			return false;
		}
	
		if(passwd1 == "")
		{
			alert("确认密码不能为空！");
			return false;
		}
		
		if(passwd != passwd1)
		{
			alert("两次密码输入不一致，请重新输入！");
			return false;
		}
	}
	
        $.post('<?php echo site_url("admin_manage/admin_manage/edit_manager"); ?>',{'user_name':user_name,'passwd':passwd,'status':status},function(result) {  
			if(result == 1)
			{
				alert("编辑成功");
			}
			else
			{
				alert("编辑失败");
			}
            window.location.href = "<?php echo site_url('admin_manage/admin_manage'); ?>";
        });  

}

function change_show<?php echo $admin_num;?>()
{
	if($("#if_change_passwd<?php echo $admin_num;?>").is(':checked')){
		$("#edit_first_password<?php echo $admin_num;?>").show();
		$("#edit_confirm_password<?php echo $admin_num;?>").show();
	}
	else
	{
		$("#edit_first_password<?php echo $admin_num;?>").hide();
		$("#edit_confirm_password<?php echo $admin_num;?>").hide();
	}
}
<?php $admin_num++; endforeach; } ?>

//删除用户
function del_user(user_name) {


    if(confirm("您确定删除该管理员吗？") == true ) {
        $.post('<?php echo site_url("admin_manage/admin_manage/del_user"); ?>',{'user_name':user_name},function(result) {  
        
            window.location.href = "<?php echo site_url('admin_manage/admin_manage'); ?>";
        });  
    }
    else {
        return false;
    }
}

</script>

</head>

<body>
<div class="content">
    <div class="header">
    <a href="#"><img src="<?php echo base_url(); ?>images/logo.png"></a>中国电信云计算实验室 <span>网络模拟平台</span>
	
	<?php include $this->config->item('abs_path').'/public/net_header.php'; ?>
	
    </div>

    <?php include $this->config->item('abs_path').'/public/leftside.php'; ?>
  
    <!--left end-->
    
    <div class="content-body">
    	<h4 style="margin-top:30px;">用户管理</h4>

        <!--
         <div class="search-list-box">
         <input type="text" placeholder="请输入用户名称"><a href="###">&nbsp;</a>
        </div>
       -->
		<div class="add-list-box" style="margin-left:30px;margin-bottom:30px;">
   
		 <!-- <button type="button" class="btn btn-default">   -->
 	  
          <div class="btn-group-box" >
     	<a id="modal-937667" href="#modal-container-937667" role="button" class="btn" data-toggle="modal">新建</a>
		  </div>
          <!-- </button> -->
        </div>
		
		<!--
        <div class="btn-group-box" style="margin-top:20px">
			<a id="modal-937667" href="#modal-container-937667" role="button" class="btn" data-toggle="modal">新建</a>
        </div>
		-->

		<div class="modal fade" id="modal-container-937667" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								新增用户
							</h4>
						</div>
						<div class="modal-body">

							<form class="form-horizontal" role="form">
				<div class="form-group">
					 
					<label for="add_username" class="col-sm-2 control-label">
						用户名
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="add_username">
					</div>
				</div>
				
				<!--
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							 
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				-->
				
				<div class="form-group">
					 
					<label for="add_passwd" class="col-sm-2 control-label">
						密码
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="add_passwd">
					</div>
				</div>
				<div class="form-group">
					 
					<label for="add_passwd1" class="col-sm-2 control-label">
						确认密码
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="add_passwd1">
					</div>
				</div>
				
				<div class="form-group">
					 
					<label for="select_status" class="col-sm-2 control-label">
						权限
					</label>
					<div class="col-sm-10">
						<select id="select_status"  class="control-select">
                                    <option value="config">配置</option>
                                    <option value="ready_only">查看</option>
                        </select>
					</div>
				</div>
			

			</form>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
							</button> 
							<button type="button" class="btn btn-primary" onclick = "add_manager()">
								提交
							</button>
						</div>
					</div>
					
				</div>
				
			</div>


     	<div class="content-body-content content-log-body" style="margin-top:40px">
        	<table class="table">
            	<thead>
            	<tr bgcolor="#DDDDFF">
                    <th width="15%">用户名</th>
                    <th width="15%">角色权限</th>
                    <th width="15%">操作</th>
                </tr>
                </thead>
                <tbody>

                <?php $admin_num = 1;if(!empty($admin_list['user_list'])){foreach($admin_list['user_list'] as $data): ?>

                <tr bgcolor= '<?php echo $data['status'] == "config"? "#D9FFFF":"#EOEOEO";?>' >
                    <td><?php echo $data['user_name'];?></td>
                    <td>
					<?php echo $data['status'] == "config"? "配置":"查看";?>
					</td>
                    <td>
                    <a href="#edit_modal<?php echo $admin_num; ?>" role="button" class="btn" data-toggle="modal"><img src="<?php echo base_url();?>images/list_edit.png"></a>
                    <a href="#" onclick="del_user('<?php echo base64_encode($data['user_name']); ?>');"?><img src="<?php echo base_url();?>images/list_del.png"></a>
                    </td>


                </tr>

                <?php $admin_num++; endforeach; } ?>

                
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $admin_num = 1;if(!empty($admin_list['user_list'])){foreach($admin_list['user_list'] as $data): ?>
<div class="modal fade" id="edit_modal<?php echo $admin_num;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								编辑用户
							</h4>
						</div>
						<div class="modal-body">

							<form class="form-horizontal" role="form">
				<div class="form-group">
					 
					<label for="edit_username<?php echo $admin_num;?>" class="col-sm-2 control-label">
						用户名
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="edit_username<?php echo $admin_num;?>" value="<?php echo $data['user_name'];?>" readonly="readonly">
					</div>
				</div>
				

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							 
							<label>
								<input type="checkbox" onchange="change_show<?php echo $admin_num;?>();" id="if_change_passwd<?php echo $admin_num;?>"> 修改密码
							</label>
						</div>
					</div>
				</div>
				
				<div class="form-group" id="edit_first_password<?php echo $admin_num;?>" style="display:none;">
					 
					<label for="edit_passwd<?php echo $admin_num;?>" class="col-sm-2 control-label">
						密码
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="edit_passwd<?php echo $admin_num;?>">
					</div>
				</div>
				<div class="form-group" id="edit_confirm_password<?php echo $admin_num;?>" style="display:none;">
					 
					<label for="edit_passwd1_<?php echo $admin_num;?>" class="col-sm-2 control-label">
						确认密码
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="edit_passwd1_<?php echo $admin_num;?>">
					</div>
				</div>
				
				<div class="form-group">
					 
					<label for="edit_status_<?php echo $admin_num;?>" class="col-sm-2 control-label">
						权限
					</label>
					<div class="col-sm-10">
						<select id="edit_status_<?php echo $admin_num;?>"  class="control-select">
						<?php if($data['status'] == "config"){ ?>
                                    <option value="config" selected="selected">配置</option>
                                    <option value="ready_only">查看</option>
						<?php }else{ ?>
                                    <option value="config">配置</option>
                                    <option value="ready_only" selected="selected">查看</option>						
						<?php } ?>
                        </select>
					</div>
				</div>
			

			</form>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
							</button> 
							<button type="button" class="btn btn-primary" onclick = "edit_manager<?php echo $admin_num;?>()">
								提交
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
<?php $admin_num++; endforeach; } ?>







</body>
</html>
