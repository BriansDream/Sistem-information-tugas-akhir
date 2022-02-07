
If u delete file make sure you also delete image from that data.



<!-- File handling / Upload file -->
Make sure to put HTML attribut encoding type / enctype = "multipart/form-data";
agar input wity type file dapat ditangani oleh $_FILES

$_FILES contains array associative 2 dimention

before upload file you must to check
1. If there is no image that user upload
2. Make sure file that user uploaded is image extention
3. Make sure size from file that user uploaded is small

after that u can move that file from temporary file into directory
but you have to make sure there is no image file with the same name.

Don't use random string because itu akan berpengaruh dengan masalah SEO
u have to use this if there is a image file with the same name.
a.jpg to a1.jpg (it better)
