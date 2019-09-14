<?php
$input = filter_input(INPUT_POST, "btnSubmit");
if (isset($input)){
    $med_record_number = filter_input(INPUT_POST, 'txtMRN');
    $citizen_id_number = filter_input(INPUT_POST, 'txtCIN');
    $name = filter_input(INPUT_POST, 'txtName');
    $address = filter_input(INPUT_POST, 'txtAddress');
    $birth_place = filter_input(INPUT_POST, 'txtBirthPlace');
    $birth_date = filter_input(INPUT_POST, 'txtBirthDate');
    $phone_number = filter_input(INPUT_POST, 'txtPhoneNumber');
    $photo = filter_input(INPUT_POST, 'txtPhoto');
    $insurance = filter_input(INPUT_POST, 'txtInsurance');
    addPatient($med_record_number, $citizen_id_number, $name, $address, $birth_place,$birth_date ,$phone_number, $photo, $insurance);
}
?>

<table>
    <thead>
    <tr>
        <th>Record Number</th>
        <th>Insurance Name</th>
        <th>Id Number</th>
        <th>Name</th>
        <th>Address</th>
        <th>Birth Place</th>
        <th>Birth Date</th>
        <th>Phone Number</th>
        <th>Photo</th>
    </tr>
    </thead>

    <tbody>
    <form method="post">
        <fieldset>
            <legend> New Patient </legend>
            <label>Med Record Number : </label>
            <input type="text" name="txtMRN" id="MRN" placeholder="isbn (13 Digit Number)" autofocus required class="form-input">
            <label>Id Number : </label>
            <input type="text" name="txtCIN" id="CIN" placeholder="title (ex. Cooking By Gordon Ramsey)" autofocus required class="form-input">
            <label>Name : </label>
            <input type="text" name="txtName" id="Name" placeholder="author (ex. Gordon Ramsey)" autofocus required class="form-input">
            <label>Address : </label>
            <input type="text" name="txtAddress" id="Address" placeholder="author (ex. Sun MEdia)" autofocus required class="form-input">
            <label>Birth Place : </label>
            <input type="text" name="txtBirthPlace" id="BirthPlace" placeholder="published date (ex. 2018-03-04)" autofocus required class="form-input">
            <label>Birth Date : </label>
            <input type="date" name="txtBirthDate" id="BirthDate" placeholder="published date (ex. 2018-03-04)" autofocus required class="form-input">
            <label>Phone Number : </label>
            <input type="text" name="txtPhoneNumber" id="PhoneNumber" placeholder="published date (ex. 2018-03-04)" autofocus required class="form-input">
            <label>Photo : </label>
            <input type="text" name="txtPhoto" id="Photo" placeholder="published date (ex. 2018-03-04)" autofocus required class="form-input">
            <select name="txtInsurance">
                <?php
                $data = getAllInsurance();
                foreach ($data as $insurance) {
                    echo "<option value='".$insurance['id']."'>" . $insurance['name_class']."</option>" ;
                }
                ?>
            </select>
            <input type="submit" name="btnSubmit" value="Add Patient" class="button button-primary">
        </fieldset>
    </form>

    <?php
    $data = getAllPatient();
    foreach ($data as $patient) {
        echo '<tr>';
        echo '<td>' . $patient['med_record_number'] . '</td>';
        echo '<td>' . $patient['name_class'] . '</td>';
        echo '<td>' . $patient['citizen_id_number'] . '</td>';
        echo '<td>' . $patient['name'] . '</td>';
        echo '<td>' . $patient['address'] . '</td>';
        echo '<td>' . $patient['birth_place'] . '</td>';
        echo '<td>' . date_format(date_create($patient['birth_date']), "d M Y") . '</td>';
        echo '<td>' . $patient['phone_number'] . '</td>';
        echo '<td>' . $patient['photo'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
