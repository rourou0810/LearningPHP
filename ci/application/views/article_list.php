<!--sidebar-menu-->
<style type="text/css">
    .pagination{float: right;}
    .pagination>.active>a{background-color: #41BEDD;border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);}
</style>
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i></a>
  <ul>
    <li><a href="<?php echo base_url('index.php/home/index') ?>"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="active"> <a href="<?php echo base_url('index.php/article/index') ?>"><i class="icon icon-signal"></i> <span>文章</span></a> </li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
    <a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> 
    <a href="#" class="current">文章</a> </div>
    <h1>文章管理</h1>
  </div>
  
  <div class="container-fluid" style="height: 700px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title btn-icon-pg"> 
            <ul>
                <li>
                    <a href="<?php echo base_url('index.php/article/addArticle') ?>" class="btn btn-info"><i class="icon-plus"></i>
                        <span>&nbsp;新建</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="btn btn-danger" id="delBtn"><i class="icon-trash"></i>
                        <span>&nbsp;删除</span>
                    </a>
                </li>
            </ul>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: left;">
                    <div class="checker" id="uniform-title-checkbox"><span>
                        <input type="checkbox" id="chk_all" name="chk_all" style="opacity: 0;"></span>
                    </div>
                  </th>
                  <th>序列号</th>
                  <th>文章标题</th>
                  <th>作&nbsp;&nbsp;者</th>
                  <th>文章简介</th>
                  <th>创建时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($articleList as $row) { ?>
                  
                <tr class="odd gradeX">
                  <td><div class="checker"><span><input type="checkbox" name="check_list" style="opacity: 0;" data-id="<?php echo $row->id; ?>"></span></div></td>
                  <td><?php echo $row->id; ?></td>
                  <td><a href="#"><?php echo $row->title; ?></a></td>
                  <td><?php echo $row->author; ?></td>
                  <td style="max-width: 300px;"><?php echo $row->introduction; ?></td>
                  <td><?php echo $row->createTime; ?></td>
                  <td class="btn-icon-pg">
                      <ul>
                          <li><a href="<?php echo base_url('index.php/article/editArticle/'.$row->id.'') ?>"><i class="icon-pencil"></i><span>&nbsp;编辑</span></a></li>
                      </ul>
                  </td>
                  
                </tr>

              <?php } ?>
                
                
              </tbody>
            </table>
          </div>
        </div>
        
      </div>

      <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
          <?php echo $links; ?>
      </div>
    </div>
</div>

<div id="maskAlert" style="display:none;">
    <div id="dj-mask-alert" style="opacity: 0.5; width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; z-index: 1000; background: rgb(0, 0, 0);"></div>
    <div class="dj-mask-alert-302748" style="width: 300px; overflow: hidden; border: 1px solid rgb(221, 221, 221); z-index: 1001; border-radius: 4px; position: fixed; top: 40%; left: 50%; margin-left: -100px; margin-top: 0px; background: rgb(255, 255, 255);"><div style="height:30px;border-bottom:1px solid #ddd;line-height:30px;padding-left:10px;font-size:14px;color:#666;background:#ebebeb">提示
        <a style="float: right; margin-right: 10px; cursor: pointer; color: rgb(102, 102, 102); font-size: 15px; transition: all 0.4s ease-in-out;" class="dj-alert-close">X</a>
        </div>
        <div style="font-size:13px;color:#333;padding:30px;overflow:hidden;word-break:break-all" class="dj-alert-content">

        </div>
        <a style="display:block;width:50px;height:25px;line-height:25px;text-align:center;border-radius:4px;background:#428bca;color:#fff;cursor:pointer;float:right;margin:5px;margin-bottom:20px;padding:0;display: none;" class="dj-alert-cancel center">取消</a>
        <a style="display:block;width:50px;height:25px;line-height:25px;text-align:center;border-radius:4px;background:#428bca;color:#fff;cursor:pointer;float:right;margin:5px;margin-bottom:20px;padding:0" class="dj-alert-ok center">确定</a>
    </div>
</div>

<script type="text/javascript">
$("#chk_all").click(function(){
    $("input[name='check_list']").attr("checked",$(this).attr("checked"));
});


$("#delBtn").click(function(){ 
    var idList=[];
    $("input[name='check_list']:checkbox:checked").each(function(){ 
        idList.push($(this).data('id')); 
    });

    function hideAlert() {
        $('.dj-alert-close').click(function() {
            $('#maskAlert').hide();   
        })
        $('.dj-alert-ok').click(function() {
            $('#maskAlert').hide(); 
        })
    }

    if(idList.length == 0){
        $('.dj-alert-content').text('请选择需要删除的数据！');
        $('#maskAlert').show();
        hideAlert();
        return false;
    }

    $('.dj-alert-cancel').show().css({'marginRight':'90px'});
    $('.dj-alert-content').text('是否确定删除当前数据？');
    $('#maskAlert').show();
    $('.dj-alert-close').click(function() {
        $('#maskAlert').hide();   
    })
    $('.dj-alert-cancel').click(function() {
        $('#maskAlert').hide();   
    })
    $('.dj-alert-ok').click(function() {
        $('#maskAlert').hide();
        $.ajax({
            type : 'POST',
            url  : '<?php echo base_url('index.php/article/delArticle'); ?>',
            data : {
                'ids' : idList
            },
            success : function(msg) {
                if(msg == 1){
                    window.location.href = "<?php echo base_url('index.php/article/index');  ?>";
                }else{
                    $('.dj-alert-content').text('数据删除失败！');
                    $('#maskAlert').show();
                    hideAlert();
                }            
            }
        }) 
    })

    
}) 
    
</script>

