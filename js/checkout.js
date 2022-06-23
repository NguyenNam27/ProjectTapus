let gia = document.getElementById('gia').innerText;


function downgia(){
    let soluong = Number(document.getElementById('quantity').value);
    soluong-=1;
    if(soluong<1) soluong=1;
    
    document.getElementById('quantity').value = soluong.toString();
    document.getElementById('gia').innerText = (gia * soluong).toString();
    document.getElementById('tong').innerText = (gia * soluong).toString() + " VNĐ";
    document.getElementById('total').value = (gia * soluong).toString();
}

function upgia(){
    let soluong = Number(document.getElementById('quantity').value);
    soluong+=1;
    document.getElementById('quantity').value = soluong.toString();
    document.getElementById('gia').innerText = (gia * soluong).toString();
    document.getElementById('tong').innerText = (gia * soluong).toString() + " VNĐ";
    document.getElementById('total').value = (gia * soluong).toString();
}


function thaydoigia(){
    let soluong = Number(document.getElementById('quantity').value);
    document.getElementById('gia').innerText = (gia * soluong).toString();
    document.getElementById('tong').innerText = (gia * soluong).toString() + " VNĐ";
    document.getElementById('total').value = (gia * soluong).toString();
}