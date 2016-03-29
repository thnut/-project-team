<style>
    
    @import url(http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);

.timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}

.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 25px;
  margin-right: -1.5px;
}

.timeline > li {
  margin-bottom: 20px;
  position: relative;
}

.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}

.timeline > li:after {
  clear: both;
}

.timeline > li > .timeline-panel {
  width: calc( 100% - 75px );
  float: right;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}

.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  left: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-right: 15px solid #ccc;
  border-left: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}

.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  left: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-right: 14px solid #fff;
  border-left: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}

.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 0px;
  margin-right: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}

.timeline-badge.primary {
  background-color: #2e6da4 !important;
}

.timeline-badge.success {
  background-color: #3f903f !important;
}

.timeline-badge.warning {
  background-color: #f0ad4e !important;
}

.timeline-badge.danger {
  background-color: #d9534f !important;
}

.timeline-badge.info {
  background-color: #5bc0de !important;
}
</style>





<div class="container">
    <ul class="timeline">
        <li>
          <div class="timeline-badge info"><i class="fa fa-smile-o"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">สถานีขนส่งอำเภอกระนวน จังหวัดขอนแก่น</h4>
            </div>
            <div class="timeline-body">
              <p>type : bus</p>
              <p>62.5 Km</p>
            </div>
          </div>
        </li>
        
        <li>
          <div class="timeline-badge primary"><i class="fa fa-star-o"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">สถานีขนส่งจังหวัดขอนแก่น แห่งที่ 1</h4>
            </div>
            <div class="timeline-body">
              <p>type : bus,van</p>
              <p>92.2 km</p>
            </div>
          </div>
        </li>
        

        <li>
          <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">สถานีขนส่งผู้โดยสารอำเภอภูเขียว จังหวัดขอนแก่น</h4>
            </div>
            <div class="timeline-body">
              <p>type : bus,van</p>
            </div>
          </div>
        </li>
        
         
    </ul>
</div>