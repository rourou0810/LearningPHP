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
                    <a href="#" class="btn btn-danger"><i class="icon-trash"></i>
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
                        <input type="checkbox" id="title-checkbox" name="title-checkbox" style="opacity: 0;"></span>
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
              <?php $i=1;foreach ($articleList as $row) { ?>
                  
                <tr class="odd gradeX">
                  <td><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></td>
                  <td><?php echo $i++; ?></td>
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

      <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"><div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate"><a tabindex="0" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_first">First</a><a tabindex="0" class="previous fg-button ui-button ui-state-default ui-state-disabled" id="DataTables_Table_0_previous">Previous</a><span><a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1</a><a tabindex="0" class="fg-button ui-button ui-state-default">2</a><a tabindex="0" class="fg-button ui-button ui-state-default">3</a><a tabindex="0" class="fg-button ui-button ui-state-default">4</a><a tabindex="0" class="fg-button ui-button ui-state-default">5</a></span><a tabindex="0" class="next fg-button ui-button ui-state-default" id="DataTables_Table_0_next">Next</a><a tabindex="0" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" id="DataTables_Table_0_last">Last</a></div></div>
    </div>
</div>

