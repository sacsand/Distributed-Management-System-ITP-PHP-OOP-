<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Members</h3>
        <div class="box-tools pull-right">
            <span class="label label-danger">8 New Members</span>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            <?php $res11=$DsrObj->Get_sales_rep()  ;
            while($r1=mysql_fetch_array($res11));
            {
                ?>
                <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image" />
                    <a class="users-list-name" href="#"><?php echo $r1['name'] ;?></a>
                    <span class="users-list-date">12 Jan</span>
                </li>

                <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image" />
                    <a class="users-list-name" href="#"><?php echo $r1['username'] ;?></a>
                    <span class="users-list-date">12 Jan</span>
                </li>
            <?php } ?>
        </ul><!-- /.users-list -->
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="javascript::" class="uppercase">View All Users</a>
    </div><!-- /.box-footer -->
</div><!--/.box -->