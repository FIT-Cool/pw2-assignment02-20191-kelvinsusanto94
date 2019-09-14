<?php
$input = filter_input(INPUT_POST, "btnSubmit");
if (isset($input)){
    $name = filter_input(INPUT_POST, 'txtName');
    addInsurance($name);
}
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>

    <tbody>
    <form method="post">
        <fieldset>
            <legend> New Insurance </legend>
            <label>Insurance Name : </label>
            <input type="text" name="txtName" id="insuranceId" placeholder="Name (ex. SunLife Platinum)" autofocus required class="form-input">
            <input type="submit" name="btnSubmit" value="Add Insurance" class="button button-primary">
        </fieldset>
    </form>

    <?php
    $data = getAllInsurance();
    foreach ($data as $insurance) {
        echo '<tr>';
        echo '<td>' . $insurance['id'] . '</td>';
        echo '<td>' . $insurance['name_class'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
