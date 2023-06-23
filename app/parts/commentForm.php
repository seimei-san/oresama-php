<?php
$position = 0;

if (isset($_POST["submitButton"])) {
    $position = $_POST["position"];
}
?>

<form class="formWrapper" method="POST">
    <div>
        <input type="submit" value="撃ち込む" name="submitButton" onclick="audio()">
        <label>名前：</label>
        <input type="text" name="username" value="<?php if ($thread["id"] == $comment["thread_id"]) echo $_SESSION["username"] ?>">
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea class="commentTextArea" name="body"></textarea>
    </div>
    <input type="hidden" name="position" value="0">

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(() => {
        $("input[type=submit]").click(() => {
            let position = $(window).scrollTop();
            $("input:hidden[name=position]").val(position);
        })
        $(window).scrollTop(<?php echo $position; ?>);
    })


</script>