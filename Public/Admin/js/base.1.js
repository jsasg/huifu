/*submit提交*/
function submit(Element){
	$(Element).submit();
}

/*icon*/
function clickIcon(Element){
	$(Element).slideToggle()
}

$(document).ready(function(){
	/*全选删除*/
	$('[name="id_all"]').click(function(){
		if($(this).is(':checked') == true){
			$('[name="id[]"]').each(function(){
				this.checked = true;			
			})
		}else{
			$('[name="id[]"]').each(function(){
				this.checked = false;;			
			})
		}
	})
	$('[name="id[]"]').click(function(){
		if(($('[name="id[]"]:checked').length) == ($('[name="id[]"]').length)){
			$('[name="id_all"]').each(function(){
				this.checked = true;
			});
		}else{
			$('[name="id_all"]').each(function(){
				this.checked = false;
			});		
		}
	})

	/*选icon*/
	$('#icon-list').find('li').click(function(){
		$('#column_icon').val($(this).find('i').attr('class'));
	})
    
    // 通过省份选城市
    $('[name="province"]').change(function(){
        $.ajax({
            url:"/huifu/index.php/Admin/User/ajaxGetAddress",
            data:{code:$(this).val()},
            dataType:'JSON',
            type:'POST',
            success:function(data){
                $('[name="city"]').html(data);
            }
        })
    })
    
    // 通过城市选区域
    $('[name="city"]').change(function(){
        $.ajax({
            url:"/huifu/index.php/Admin/User/ajaxGetAddress",
            data:{code:$(this).val()},
            dataType:'JSON',
            type:'POST',
            success:function(data){
                $('[name="area"]').html(data);
            }
        })
    })
    
    // 分类页和节点页js
    $('.cate_icon.sub').click(function(){
        var Tthis = $(this).parents('div.cate-item');
        Tthis.nextUntil('div.cate-item').toggleClass('display-none');
        $(this).toggleClass('close_sub');
    })
    
    // 分配权限页面js
    $('input.parent').change(function(){
        if($(this).is(':checked')){
            $(this).parents('div.checkbox-wrap').find(':checkbox').each(function(key,val){
                val.checked = true;
            })
        }else{
            $(this).parents('div.checkbox-wrap').find(':checkbox').each(function(key,val){
                val.checked = false;
            })
        }
    })
    $('input.sub-parent').change(function(){
        if($(this).is(':checked')){
            $(this).parents('div.checkbox-wrap').find('div.first input.parent').each(function(key,val){
                val.checked = true;
            })
            $(this).parents('div.sub-first').nextUntil('div.sub-first').find(':checkbox').each(function(key,val){
                val.checked = true;
            })
        }else{
            $(this).parents('div.sub-first').nextUntil('div.sub-first').find(':checkbox').each(function(key,val){
                val.checked = false;
            })
            
            if($(this).parents('div.checkbox-wrap').find('div.sub-last input:checked').length == 0){
                $(this).parents('div.checkbox-wrap').find('div.first input.parent').each(function(key,val){
                    val.checked = false;
                })
            }
        }
    })
    $('input.sub').change(function(){
        if($(this).is(':checked')){
            $(this).parents('div.checkbox-wrap').find('input.parent').each(function(key,val){
                val.checked = true;
            })
            
            if($(this).parents('div.checkbox-wrap').find('div.sub-last').length){
                $(this).parents('div.checkbox-wrap div.sub-last').prevUntil('div.sub-last').find('input.sub-parent').each(function(key,val){
                    val.checked = true;
                })
            }
        }else{
            if($(this).parents('div.checkbox-wrap').find('div.sub-last').length){
                if($(this).parents('div.checkbox-wrap div.sub-last').find('input:checked').length == 0){
                    $(this).parents('div.checkbox-wrap div.sub-last').prevUntil('div.sub-last').find('input.sub-parent').each(function(key,val){
                        val.checked = false;
                    })
                }
            }
            
            if($(this).parents('div.checkbox-item.last').find('input:checked').length == 0){
                $(this).parents('div.checkbox-wrap').find('input.parent').each(function(key,val){
                    val.checked = false;
                })
            }
        }
    })
})