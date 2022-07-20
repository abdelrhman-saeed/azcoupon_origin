<style>
    #store-alets-subscribe {
        position: relative;
        border-radius: 3px;
        box-shadow: 0 1px 3px 0 rgb(0 0 0 / 6%);
        background-color: #193A4A;
    }
    #store-alets-subscribe img {
        position: absolute;
        top: 22px;
        left: 0;
        vertical-align: middle;
        max-width: 100%;
        height: auto;
    }
    #store-alets-subscribe .info {
        padding: 15px 0 0 15px;
        font-size: 12px;
        flex: 0;
        color: #fff;
    }
    #store-alets-subscribe .info .title {
        font-size: 30px;
    }
    #store-alets-subscribe .title, 
    #store-alets-subscribe .subtitle {
        color:#fff;
        margin-bottom:0;
    }
    #store-alets-subscribe .info p:nth-child(2) {
        white-space: nowrap;
    }
    #store-alets-subscribe #alertsForm {
        flex: 1;
        padding: 20px 15px 20px 10px;
        min-width: 260px;
    }
    #store-alets-subscribe #alertsForm .screen-reader {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }
    #store-alets-subscribe #alertsForm input {
        margin-right: 9px;
        max-width: 340px;
        min-width: 100px;
        width:50%;
        color: #5f6b78;
        background-color: rgba(255,255,255,.9);
        vertical-align: middle;
        height: 44px;
        font-size: 16px;
        border-radius: 3px;
        padding: 12px 20px;
        background-clip: padding-box;
        border: none;
        box-sizing: border-box;
        outline: 0;
    }
    #store-alets-subscribe #alertsForm button {
        padding: 11px 10px;
        flex: 0;
        min-width: 100px;
        height: 44px;
        border-radius: 3px;
        padding: 11px;
        border: 0;
        font-size: 16px;
        font-weight: 700;
    }
</style>
        
<div id="store-alets-subscribe" class="al-f">
    <!--<img alt="" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODMiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCA4MyAzNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGRlZnM+PHBhdGggaWQ9ImEiIGQ9Ik0uOTMgMjhoMTQuMzE5Vi4xOTRILjkyOVYyOHoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMjcuNTYgMTUuMTY0bC0xMC40IDEwLjRNMzUuOTgzIDE1LjE2NGwtMTAuNCAxMC40IiBzdHJva2U9IiNGRkI1MDAiIHN0cm9rZS13aWR0aD0iNCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTU4LjA5MSAxNy41ODZoLTE5Ni4wOSIgc3Ryb2tlPSIjRkZCNTAwIiBzdHJva2Utd2lkdGg9IjEzIi8+PHBhdGggZD0iTTM2LjU3MyAxNy44MTRjMCA5Ljc0IDcuODk2IDE3LjYzNiAxNy42MzYgMTcuNjM2aDEuMDY2YzUuNTE0IDAgOS45ODQtNC40NyA5Ljk4NC05Ljk4NFYxMC4xNjJjMC01LjUxNC00LjQ3LTkuOTg0LTkuOTg0LTkuOTg0SDU0LjIxYy05Ljc0IDAtMTcuNjM2IDcuODk2LTE3LjYzNiAxNy42MzYiIGZpbGw9IiNGRkVGRDciLz48ZyB0cmFuc2Zvcm09InJvdGF0ZSgtOTAgMzQuOTYzIC0xOS41MzcpIj48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48cGF0aCBkPSJNMTUuMjUuMTk0SC45M1YyMC44NGE3LjE2IDcuMTYgMCAwIDAgMTQuMzIgMFYuMTk0eiIgZmlsbD0iI0ZGRUZENyIgbWFzaz0idXJsKCNiKSIvPjwvZz48L2c+PC9zdmc+">-->
    
    <div class="row">
        <div class="col-12">
            <div class="info text-center">
                <p class="title">NEVER MISS A PROMO CODE!</p>
                <p class='subtitle'>YOU WILL FIND EVERY VALID PROMO CODES AND DISCOUNTS</p>
            </div>
        </div>
        <div class="col-12 text-center">
            <form onsubmit="return false;" id="alertsForm" class="subscribeForm">
                <label for="subscribeFormEmail" class="screen-reader">Email address</label>
                <input type="email" name="subscribed_email" id="subscribeFormEmail" title="Email" autocomplete="off" class="email" placeholder="add your email address here">
                <button class="btn btn-main subscribe-btn bg-warning">SUBSCRIBE</button>
            </form>
        </div>
    </div>
</div>