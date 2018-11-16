<!-- Problem Details -->
<div class="modal fade" id="details<?php echo $row['Problem_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Sales Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Problem Details:<b><?php echo $row['Problem_id']; ?></b>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($row['time'])) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Device Name</th>
                            <th>Posted On</th>
                            <th>Problem Description</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from problem";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['Device']; ?></td>
                                        <td><?php echo date('M d, Y h:i A', strtotime($row['time'])); ?></td>
                                        <td><?php echo $drow['Description']; ?></td>
                                        <td><?php echo $row['Acceptance']; ?></td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                            </tbody>
                    </table>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
