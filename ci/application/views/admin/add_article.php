
<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i></a>
  <ul>
    <li><a href="<?php echo base_url('index.php/home/index') ?>"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="active"> <a href="<?php echo base_url('index.php/article/index') ?>"><i class="icon icon-signal"></i> <span>文章</span></a> </li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
    <a href="<?php echo base_url('index.php/home/index') ?>" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a>
    <a href="<?php echo base_url('index.php/article/index') ?>" class="tip-bottom"></i> 文章</a> 
    <a href="<?php if(isset($id)){echo base_url('index.php/article/addArticle/'.$id.'');}else{echo base_url('index.php/article/addArticle');} ?>" class="current"><?php if(isset($id)){echo "编辑文章";}else{echo "新建文章";} ?></a> </div>
    <h1><?php if(isset($id)){echo "编辑文章";}else{echo "新建文章";} ?></h1>
  </div>

  <input id="articleWords" type="hidden" value='<?php if(isset($id)) echo $editArticle[0]->content; ?>'>
  
  <div class="container-fluid" style="height: 800px;">
    <div class="row-fluid">
        <div class="span11">
            <div class="widget-box" style="border-radius: 5px;">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>文章</h5>
                </div>
                <div class="widget-content nopadding">
                  <div class="form-horizontal" style="overflow: hidden;">
                    <div class="control-group">
                      <label class="control-label">标&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
                      <div class="controls">
                        <input type="text" name="title" class="span11" placeholder="文章标题" 
                        value="<?php if(isset($id)) echo $editArticle[0]->title; ?>">
                        <span class="errortip"></span>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">作&nbsp;&nbsp;&nbsp;&nbsp;者：</label>
                      <div class="controls">
                        <input type="text" name="author" class="span11" placeholder="作者"
                        value="<?php if(isset($id)) echo $editArticle[0]->author; ?>">
                        <span class="errortip"></span>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">关&nbsp;键&nbsp;字：</label>
                      <div class="controls">
                        <input type="text" name="keywords" class="span11" placeholder="标签"
                        value="<?php if(isset($id)) echo $editArticle[0]->keywords; ?>">
                        <span class="errortip"></span>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">文章简介：</label>
                      <div class="controls">
                        <textarea name="introduce" class="span11" id="introduce"><?php if(isset($id)) echo $editArticle[0]->introduction; ?></textarea>
                        <span class="errortip"></span>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">文章内容：</label>
                      <div class="controls" style="width:70%;" id="artcontent">
                        <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
                        <span class="errortip"></span>
                      </div>
                    </div>
                    <div class="form-actions" style="float: right;margin-right: 200px;">
                      <button id="articleSaveBtn" type="submit" class="btn btn-success">保存</button>
                    </div>
                  </div>
                </div>
              </div>
          
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
        <a style="display:block;width:50px;height:25px;line-height:25px;text-align:center;border-radius:4px;background:#428bca;color:#fff;cursor:pointer;float:right;margin:5px;margin-bottom:10px;padding:0" class="dj-alert-ok">确定</a>
    </div>
</div>

<script type="text/javascript">
    
$(function(){

    var articleWords = document.getElementById('articleWords').value;
    var ue = UE.getEditor('editor');
    ue.ready(function() {
        //设置编辑器的内容
        ue.setContent(articleWords);
    });

    $('#articleSaveBtn').click(function() {

        var isCheckSave = true;
        var $title     = $("input[name='title']"),
            $author    = $("input[name='author']"),
            $keywords   = $("input[name='keywords']"),
            $introduce = $("#introduce");

        if($title.val() == '') {
            errorMsg($title,'标题不能为空');
            isCheckSave = false;
        }
        if($author.val() == '') {
            errorMsg($author,'作者不能为空');
            isCheckSave = false;
        }
        if($keywords.val() == '') {
            errorMsg($keywords,'关键字不能为空');
            isCheckSave = false;
        }
        if($introduce.val() == '') {
            errorMsg($introduce,'文章简介不能为空');
            isCheckSave = false;
        }
        if(ue.hasContents()==false) {
            $('#artcontent').find('.errortip').empty();
            $('#artcontent').find('.errortip').text('文章内容不能为空').show();
            isCheckSave = false;
        }

        function errorMsg(ele,msgtip){
            ele.next().empty();
            ele.next().text(msgtip).show();
        }

        if(isCheckSave == false) {
            return false;
        }else{
            $.ajax({
                type:'post',
                url:'<?php if(isset($id)){echo base_url('index.php/article/addArticle/'.$id.'');}else{echo base_url('index.php/article/addArticle');}  ?>',
                data:{
                    'title':$title.val(),
                    'author':$author.val(),
                    'keywords':$keywords.val(),
                    'introduce':$introduce.val(),
                    'editorValue':ue.getContent()
                },
                success:function(msg){
                    if(msg == 1){
                        $('.dj-alert-content').text('数据保存成功！');
                    }else{
                        $('.dj-alert-content').text('数据保存失败！');
                    }
                    $('#maskAlert').show();
                    $('.dj-alert-ok').click(function() {
                        $('#maskAlert').hide();
                        window.location.href="<?php echo base_url('index.php/article/index');  ?>";
                    })
                    $('.dj-alert-close').click(function() {
                        $('#maskAlert').hide();
                        
                    })
                }
            })
        }
    })

})
    
</script>

