// pages/homePage/homePage.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    /*导航图片 */
    nav_img: [
    {
      image: 'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc4585303f22.png',
      text: '卖旧机'
    },
    {
      image: 'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc45851ec058.png',
      text: '买二手'
    },
    {
      image: 'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc45850dd32e.png',
        text: '换新机'
    },
    {
      image: 'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc4584fe90b5.png',
        text: '修手机'     
    }
    
    ],
    /*轮播图*/
    imgUrls: [
      'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc467aed6cb4.png',
      'https://img.zhichiwangluo.com/zcimgdir/album/file_5bc4682a01ef9.png'
    ],
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
     
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})