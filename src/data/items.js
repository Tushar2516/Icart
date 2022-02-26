/*import axios from 'axios';

var items = [];
axios({
    method: 'GET',
    url: 'http://localhost/API/api.php?request=1'
})
.then( (response) =>(items = response.data))
.catch(function (error) {
    console.log(error);
  });

*/

/*const items = [{
        id: 1,
        name: "One Tribe Black Edition",
        img: "https://enftymart.themenio.com/img/nft-lg.8f26d1a6.jpg",
        val: "14.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 2,
        name: "Black New",
        img: "https://miro.medium.com/max/2000/1*AJrLFnuCAD8dE1p1Bg0dbg.jpeg",
        val: "12.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 3,
        name: "One Tribe",
        img: "https://creativereview.imgix.net/content/uploads/2021/09/F4E079D612B9653BEFC4D8D2F39781E39A3025C693B177A61D6C73A5156248EA.jpg?auto=compress,format&q=60&w=1200&h=849",
        val: "18.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 4,
        name: "Tribe Black Edition",
        img: "https://coffeebros.com/wp-content/uploads/2021/10/astronaut-background.jpg",
        val: "11.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 5,
        name: "One Tribe Black",
        img: "https://cloudfront-us-east-1.images.arcpublishing.com/coindesk/5NOWWNNEBRER7BXFZKCYRCA7NA.jpg",
        val: "19.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 6,
        name: "One Black Edition",
        img: "https://static01.nyt.com/images/2021/08/15/fashion/TEEN-NFTS--fewocious/TEEN-NFTS--fewocious-videoSixteenByNineJumbo1600.jpg",
        val: "244.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 7,
        name: "One Tribe Edition",
        img: "https://miro.medium.com/max/980/1*3iesg_sr8kC6NYN2iiFHRQ.png",
        val: "44.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 8,
        name: "Tribe Black Edition",
        img: "https://static01.nyt.com/images/2021/08/15/fashion/TEEN-NFTS--fewocious/TEEN-NFTS--fewocious-videoSixteenByNineJumbo1600.jpg",
        val: "99.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 9,
        name: "The Edition",
        img: "https://www.digitalmusicnews.com/wp-content/uploads/2021/11/are-nfts-a-scam-feat.png",
        val: "79.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 10,
        name: "The Black",
        img: "https://miro.medium.com/max/1082/1*ZZdfsIVNuvbWB15csehQTg.jpeg",
        val: "89.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 11,
        name: "One of the",
        img: "https://www.hollywoodreporter.com/wp-content/uploads/2021/10/Mutant-Demon-Ape-Credit-0xb1-copy-H-2021.jpg?w=681&h=383&crop=1",
        val: "199.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
    {
        id: 12,
        name: "Look for",
        img: "https://wp-assets.futurism.com/2021/11/person-furious-right-click-saved-precious-nft.jpg",
        val: "299.99",
        discription: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'",
        owner: "ZeniconStudio",
        quantity: 0,
    },
]*/

export default items