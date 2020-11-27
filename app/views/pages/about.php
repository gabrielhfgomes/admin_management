<?php require APP_ROOT . '/views/inc/header.php' ?>
    <div class="title-subpage">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo $data['description']; ?></p>
        <p><?php echo APP_VERSION; ?></p>
        <p>Application next improvements:</p>
        <ul>
            <li>Implement AWS Cognito authetication</li>
            <li>Implement Angular Front-end for more dynamic pages and speed up front-end construction with components</li>
            <li>Tables Pagination with angular components</li>
            <li>Tables Search with angular components</li>
            <li>Implement angular translations resources for internacionalization</li>
        </ul>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>