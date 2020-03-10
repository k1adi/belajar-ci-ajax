<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="assets/jquery.js"></script>

    <script>
        $(document).ready(function(){
            const baseUrl = '/belajar/';
            $(".btn_submit").click(function(e){
                e.preventDefault();
                let name = $("[name='user_name']").val();
                let age = $("[name='user_age']").val();
                let gender = $("[name='user_gender']").val();
                let religion = $("[name='user_religion']").val();
                
                $.post('<?= base_url();?>main_controller/insert_user',
                {
                    new_name : name,
                    new_age : age,
                    new_gender : gender,
                    new_religion : religion
                }, function(result){
                    let obj = JSON.parse(result);
                    // console.log(result);
                    // console.log(obj.msg)
                    if(obj.msg == '200'){
                        // alert('Data berhasil ditambah');
                        $("[name='user_name']").val("");
                        $(".btn_show").click();
                    } else {
                        alert('Data gagal ditambah');
                    }
                    // console.log(obj.create.msg);
                });
                // console.log(name, age, gender, religion);
            });
            // $('.form_insert').submit(function(e){
            //     e.preventDefault();
            // });

            $('.btn_show').click(function(){
                $.post('<?= base_url();?>main_controller/get_user',
                    function(result){
                        $(".table").html(result);
                });
            });
        });
    </script>

    <style>
        .btn_submit:active{
            background-color:green;
        }
    </style>
</head>
<body>
    <form class='form_insert'>
        <input type="text" name="user_name" placeholder="Nama lengkap">
        <input type="text" name="user_age" placeholder="Umur sekarang">
        <input type="radio" name="user_gender" value="0"> Perempuan
        <input type="radio" name="user_gender" value="1"> Laki - Laki
        <select name="user_religion">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katholik">Katholik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
        </select>

        <button class="btn_submit" style="cursor:pointer;">Submit</button>

        <!-- <a href="<?= base_url();?>tables" class="btn_submit">halaman table</a> -->
    </form>
    
    <button class='btn_show'>Tampil</button>

    <div class="table"></div>
</body>
</html>