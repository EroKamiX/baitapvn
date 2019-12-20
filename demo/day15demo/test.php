<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
if (isset($_GET['submit'])){
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    if (isset($_GET['gender'])){

    }
    if (isset($_GET['jobs'])){

    }
}
?>
<form action="" method="get">
    Name:
    <br/>
    <input type="text" name="name" value=""/>
    <br />
    Gender:
    <br/>
    <input type="radio" name="gender" value="1" /> Nam
    <input type="radio" name="gender" value="2" /> Nữ
    <input type="radio" name="gender" value="3" /> Khác
    <br/>
    Country :
    <br/>
    <select name="country">
        <option value="1">Việt Nam</option>
        <option value="2">USA</option>
        <option value="3">JPA</option>
    </select>
    <br/>
    Jobs:
    <br />
    <input type="checkbox" name="job[]" value="1"/> Developer
    <input type="checkbox" name="job[]" value="2"/> Tester
    <input type="checkbox" name="job[]" value="3"/> BA (Bussiness Analy)
    <br/>
    <textarea name="info"></textarea>
    <br/>
    <input type="submit" name="submit" value="submit">
</form>