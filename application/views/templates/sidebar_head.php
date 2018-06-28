<section id="content">
    <div class="container" >
        <div class="row" >
            <!--=====================Left Bar======================-->
            <div class="col-lg-4" >
                <aside class="right-sidebar">
                    <div class="widget">
                        <fieldset>
                            <?php echo form_open('search') ?>
                            <form>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input name="cond" class="form-control" type="text" placeholder="Search..">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" value="搜尋" id="submitButton" class="btn btn-large btn-theme" />
                                    </div>
                                </div>
                                <!--
                                <div id="searchInContainer">
                                    <input type="radio" name="check" value="site" id="searchSite" checked />
                                    <label for="searchSite" id="siteNameLabel">姓名</label>
                                    <input type="radio" name="check" value="site" id="searchSite" checked />
                                    <label for="searchSite" id="siteNameLabel">系所</label>
                                    <input type="radio" name="check" value="site" id="searchSite" checked />
                                    <label for="searchSite" id="siteNameLabel">領域</label>
                                    <input type="radio" name="check" value="web" id="searchWeb" />
                                    <label for="searchWeb">所有</label>
                                </div>
                                -->
                            </form>
                        </fieldset>
                    </div>
                    <!--
                    <div class="widget">
                        <h5 class="widgetheading">所有專業領域</h5>
                        <ul class="cat">
                            <li><i class="icon-angle-right"></i><a href="#"> 電腦工程</a><span> (20)</span></li>
                            <li><i class="icon-angle-right"></i><a href="#"> 企業管理</a><span> (11)</span></li>
                            <li><i class="icon-angle-right"></i><a href="#"> 工程機械</a><span> (9)</span></li>
                            <li><i class="icon-angle-right"></i><a href="#"> 金融財管</a><span> (12)</span></li>
                            <li><i class="icon-angle-right"></i><a href="#"> 電子電機</a><span> (18)</span></li>
                        </ul>
                    </div>
                    -->
                </aside>
            </div>