<div class="user-comments" data-id="">
    <?php
        $comments=$user = DB::table('comments')->select('content','uid','ctime')->where('mid', '=',$record->mid)->get();
            foreach ($comments as $key => $comment) {
    ?>
    <ul class="commnet-items">
        <li>
            <div class="comment-avatar">
                <a href="javascript:js_method();">
                    <img src="common/image/cat.jpg" alt="avatar"/>
                </a>
            </div>
            <div class="comment-content">

                <div class="content-detail">
                    <a href="javascript:js_method();">
                        <?php
                            $user=new User();
                            $name=$user->getUserNameById($comment->uid);
                            echo $name[0]->name;
                        ?>:</a>
                    {{$comment->content}}
                </div>
                <div class="comment-op">
                    <span class="time">今天{{date('H:i',$comment->ctime)}}</span>
                    <a href="javascript:js_method();" onclick="replyComment(this)">
                        <span>回复</span>
                    </a>
                </div>
            </div>
            <div class="clear"></div>
            <div class="comment-sub">
                
            </div>
        </li>
    </ul>
    <?php
        }
        ?>
</div>