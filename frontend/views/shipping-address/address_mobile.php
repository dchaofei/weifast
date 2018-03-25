<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>填写收货地址</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= \yii\helpers\Html::cssFile('/layui/css/layui.css') ?>
    <?= \yii\helpers\Html::cssFile('/layui/css/layui.mobile.css') ?>
</head>
<body>

<div class="layui-">
    <div class="layui-row">
<blockquote class="layui-elem-quote layui-text">
    亲~~~, 填写收货信息后，我们将尽快为你发货。:)
</blockquote>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>请填写收货信息</legend>
    </fieldset>

    <form class="layui-form"  method="POST">
        <div class="layui-form-item">
            <div class="layui-form-label layui-col-xs3 layui-col-sm3 layui-col-md3">姓名</div>
            <div class="layui-col-xs9 layui-col-sm9 layui-col-md9">
                <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入姓名" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label layui-col-xs3 layui-col-sm3 layui-col-md3">手机号</label>
            <div class="layui-col-xs9 layui-col-sm9 layui-col-md9">
                <input type="tel" name="phone" lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-form-label layui-col-xs3 layui-col-sm3 layui-col-md3">地址</div>
            <div class="layui-col-xs9 layui-col-sm9 layui-col-md9">
                <input type="text" name="address" lay-verify="required" placeholder="请输入详细地址" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label layui-col-xs3 layui-col-sm3 layui-col-md3">备注</label>
            <div class="layui-col-xs9 layui-col-sm9 layui-col-md9">
                <textarea name="comment" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="demo1">填完了</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<?= \yii\helpers\Html::jsFile('/layui/layui.js') ?>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer


    });
</script>

</body>
</html>