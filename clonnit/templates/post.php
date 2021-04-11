
    <main>
        <div class="container">
            <div class="left-title">
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
            </div>
            <div class="right-title">
                <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, fugit?</h2>
            </div>
            <div class="left-content">
                <?php
                $s = new Contentdata();
                $s->GetAllPosts();
                ?>
            </div>
        </div>
    </main>