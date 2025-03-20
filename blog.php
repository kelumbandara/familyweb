<?php include("header.php")?>
<link rel="stylesheet" href="./assets/css/blog.css">
<div class="header">
    බ්ලොග් පිටුව
    </div>
    <div class="topHeadlines">
        <div class="left">
            <div class="title">
                <h2>උණුසුම් පුවත්</h2>
            </div>
            <?php
                $n = 1;
                $offset = $n - 1;
                $sql = "SELECT * FROM blogs ORDER BY id ASC LIMIT 1 OFFSET $offset "; 
                $result = mysqli_query($con, $sql);

                $row=mysqli_fetch_assoc($result);
            ?>
            <div class="img" id="breakingImg">
                <img src="./adminPanel/assets/blogImages/blogTitle/<?php echo $row['image']?>" alt="">
            </div>
            <div class="text" id="breakingNews">
                <div class="title">
                    <a href="./blog_detail.php?blog_id=<?php echo $row['id']?>">
                        <h2><?php echo $row['heading']?></h2>
                    </a>
                </div>
                <div class="description">
                <?php  $content = $row['content'];
                $contentArray = explode(' ', $content);
                echo (count($contentArray) > 25) 
                    ? implode(' ', array_slice($contentArray, 0, 20)) . '...' 
                    : $content;
                
                ?>       
            </div>
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h2>විශේෂාංග</h2>
            </div>
            <div class="topNews">
                <?php
                    $allblogs="SELECT * FROM blogs";
                    $allResult=mysqli_query($con,$allblogs);

                   
                        while($row2=mysqli_fetch_assoc($allResult)){
                            ?>
                    <div class="news">
                    <div class="img">
                        <img src="./adminPanel/assets/blogImages/blogTitle/<?php echo $row2['image']?>" alt="">
                    </div>
                    <div class="text">
                        <div class="title">
                            <a href="./blog_detail.php?blog_id=<?php echo $row2['id']?>">
                                <p><?php echo $row2['heading']?></p>
                            </a>
                            
                        </div>
                    </div>
                </div>
                    
                        <?php
                            }
                        ?>
                
            </div>

        </div>
    </div>
    <div class="page2">
       

        

        <div class="news" id="businessNews">
            <div class="title">
                <h2>බ්ලොග්</h2>
            </div>
            <div class="newsBox">
                <?php
                $category="blog";
                $allblogs="SELECT * FROM blogs WHERE Category='$category' ORDER BY id ASC LIMIT 5;";
                $allResult=mysqli_query($con,$allblogs);
                    while($row2=mysqli_fetch_assoc($allResult)){
                        ?>
                <div class="newsCard">
                    <div class="img">
                        <img src="./adminPanel/assets/blogImages/blogTitle/<?php echo $row2['image']?>" alt="">
                    </div>
                    <div class="text">
                        <div class="title">
                        <a href="./blog_detail.php?blog_id=<?php echo $row2['id']?>"> <p><?php echo $row2['heading']?></p></a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    ?>
            </div>
        </div>


        
    </div>

    <!-- Footer Start -->
    <?php include("footer.php")?>

 
