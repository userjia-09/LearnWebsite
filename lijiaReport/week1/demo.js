// JavaScript Document
'use strict';
$(function(){
//��ȡ��ָ���ֲ�ͼԪ���ϵ�һ����������
//��ȡ�������ֲ�ͼ����
var $carousels=$('.carousel');
var startX,endX;
//�ڻ�����һ����Χ�ڣ����л�ͼƬ
var offset=50;
//ע�Ử���¼�
$carousels.on('touchstart',function(e){
//��ָ������ʼʱ��¼һ����ָ���ڵ�����x
startX=e.originalEvent.touches[0].clientX;

});
$carousels.on('touchmove',function(e){
//Ŀ���ǣ���¼��ָ�뿪��Ļһ˲���λ�ã���move�¼��ظ���ֵ
endX=e.originalEvent.touches[0].clientX;
});
$carousels.on('touchend',function(e){
var distance=Math.abs(startX-endX);
if(distance>offset){
$(this).carousel(startX>endX?'next':'prev');
}
})
});
