<?php

if($exception){
    $message = [
        'type'=>'error',
        'message'=>$exception->getMessage()
    ];
}

?>

<?php if($message): ?>
    <div class="my-3 alert alert-<?= $message['type'] === 'error' ? 'danger' : '' ?>" 
         role='alert'>
        <?= $message['message']; ?>
    </div>
<?php endif ?>