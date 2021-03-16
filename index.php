<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascading Dropdown</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Dynamic Dropdown Using AJAX</h1>
        <form>
        <div class="row">
        <?php 
            $get = file_get_contents('states-and-districts.json');
            $records = json_decode($get);
            //echo '<pre>';print_r($records);
        ?>  
            <div class="form-group col-sm-4">
                <label for="state">State</label>
                <select class="form-control" id="state-list" name="states">
                    <option value="">--Select State--</option>
                    <?php foreach($records as $record): ?>
                        <option value="<?= $record->state ?>"><?= $record->state ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="district">District</label>
                <select class="form-control" id="district-list" name="districts">
                    <option value="">--Select District--</option>
                </select>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#state-list').on('change',function(){
            //console.log($('#state-list').val());
            var state = $('#state-list').val();
            $.ajax({
                url: 'getdata.php',
                type: 'POST',
                datatype: 'json',
                data: {'state':state},
                success: function(response){
                    $('#district-list').html(response)
                },
                error: function(){
                    console.log('internal server error')
                }
            });
        });
    });
</script>