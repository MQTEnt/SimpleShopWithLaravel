//Page-Level Demo Scripts - Tables - Use for reference
// $(document).ready(function() {
// 	$('#dataTables-example').DataTable({
// 		responsive: true
// 	});
// });

//Hien thi thong bao va an di sau 3s 
$("div.alert").fadeOut(8000);
//or
//$("div.alert").delay(3000).slideUp();

//Hien thi thong bao xoa
function confirmDelete(mgs)
{
	if(confirm(mgs))
		return true;
	return false;
}

//Xoa anh detail tai Edit Product
$(document).ready(function(){
	$('a.iconDel').click(function(){
		//Lay token de co the request
		var token=$("form[name='formEdit']").find("input[name='_token']").val();

		//Lay id cua image trong co so du lieu, id nay duoc gan o the img luc tao form edit
		var idImg=$(this).parent().find("img").attr('id');

		//Tao duong dan toi route xoa detail image (chu y them phan cuoi de co duong dan dung)
		var urlRequestDelele=$("form[name='formEdit']").find("input[name='urlRoot']").val()+'/admin/product/deleteDetailImage/'+idImg;
		
		//Lay src cua img
		var srcImg=$(this).parent().find("img").attr('src');

		//Lay id cua div trong view de xoa giao dien anh
		var idDel=$(this).parent().attr('id');

		//AJAX
		$.ajax(
		{
			url: urlRequestDelele,
			cache: false,
			type: 'GET',
			data: {"token": token, "idImg": idImg, "srcImg": srcImg},
			success: function(data)
			{
				if(data=='1')
				{
					//Sau khi xoa xong du lieu tai database (phuong thuc tai controller return 1) thi thuc hien
					$('.itemDiv[id='+idDel+']').fadeOut(1500);
				}
				else
				{
					alert('Error');
				}
			}
		});
	});
});

//Hien thi input file khi click nut them
$(document).ready(function(){
	$('#addFileBtn').click(function(){
		$('.addArea').prepend('<input class="inputImage" type="file" name="imageDetail[]">');
	});
});


//Hien thi loi khi 1 cate chon chinh no lam cate parent
$(document).ready(function(){
	if($('#idCate').length) //Neu ton tai element co id la idCate -> dang o trang edit -> kiem tra
	{
		var idCurrentCateParent=$('select[name="sltParentId"]').val();
		var idCate=$('#idCate').val();
		$('option').click(function(){
			var idNewParent=$('select[name="sltParentId"]').val();
			if(idNewParent==idCate)
			{
				alert("You can't choose this category to make itseft category parent!")
				$('select[name="sltParentId"').val(idCurrentCateParent);
			}
		});
	}
});

//Update About
$(document).ready(function(){
	$('#btnUpdateAbout').click(function(){
		urlRequestUpdateAbout='/admin/about/updateAbout';
		token=$("input[name='_token'").val();
		txtAbout=CKEDITOR.instances.txtAbout.getData()
		$.ajax({
			url: urlRequestUpdateAbout,
			type: 'POST',
			cache: false,
			data: {"_token": token, "txtAbout": txtAbout},
			success: function(data){
				if(data=='1')
					alert('Update Success');
				else
					alert('Error');
			}
		});
	});
});

//Add Banner
$(document).ready(function(){
	$('#btnAddBanner').click(function(){
		if($('#btnSubmitBanner').length==0)
		{
			$('.addfilebannerarea').prepend('<button id="btnSubmitBanner" class="btn btn-success" type="submit">Submit</button>')
		}
		$('.addfilebannerarea').prepend('<input type="file" name="fileBanner[]">');
	});

	//Ngan submit form de kiem tra dieu kien
	$("form[name='frmUploadBanner'").on('submit',function(e){
		var files=$("input[name='fileBanner[]']");
		var a=[1,2];
		$.each(files,function( index, val){
			if(val.value=="")
			{
				e.preventDefault();
				alert('Input file have not to blank');
				return false;
			}
		});
	})
});

//Delete banner
$(document).ready(function(){
	$('a#btnDeleteBanner').click(function(){
		return confirm('Do you want to delete this banner?');
	});
});

//Add contact
$(document).ready(function(){
	$('#btnUpdateContact').click(function(){
		urlRequestUpdateContact="/admin/about/updateContact";
		token=$("input[name='_token']").val();
		txtFacebook=$("input[name='txtFacebook']").val();
		txtTwitter=$("input[name='txtTwitter']").val();
		txtEmail=$("input[name='txtEmail']").val();
		txtPhone=$("input[name='txtPhone']").val();
		$.ajax({
			url: urlRequestUpdateContact,
			type: "POST",
			cache: false,
			data: {
				"_token": token, 
				"txtPhone": txtPhone, 
				"txtEmail": txtEmail, 
				"txtFacebook": txtFacebook,
				"txtTwitter": txtTwitter
			},
			success: function(dataResponse)
			{
				if(dataResponse=="1")
				{
					alert('Update Contact Success');
				}
				else
				{
					alert('Error');
				}
			}
		});
	});
});