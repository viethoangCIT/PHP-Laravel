<?php

    //*****************************************
	//FUNCTION HEADER
	//*****************************************
	$function_title = "Video";
    echo $this->Template->load_function_header($function_title);
    //*****************************************
    //FUNCTION HEADER
    //*****************************************

    $str_form_row_video = "";


    //tao form
    $str_input_group_name = $this->Template->load_textbox(array("name"=>"data[group_name]","style"=>"width:50%"));
    $str_input_type = $this->Template->load_textbox(array("name"=>"data[type]","style"=>"width:50%"));
    $str_input_file = $this->Template->load_textbox(array("name"=>"data[file]","style"=>"width:50%"));
    $str_input_emb_code = $this->Template->load_textbox(array("name"=>"data[emb_code]","style"=>"width:50%"));
    $str_input_des = $this->Template->load_textbox(array("name"=>"data[des]","style"=>"width:50%"));
    $str_hidden_picture = $this->Template->load_hidden(array("name"=>"data[id]","value"=>$id));
    $str_save_button = $this->Template->Load_button(array("value"=>"Lưu","type"=>"submit"),"Lưu");

    $str_form_row_video .= $this->Template->load_form_row(array("title"=>"Tên video","input"=>$str_input_group_name));
    $str_form_row_video .= $this->Template->load_form_row(array("title"=>"Loại","input"=>$str_input_type));
    $str_form_row_video .= $this->Template->load_form_row(array("title"=>"Tên File","input"=>$str_input_file));
    $str_form_row_video .= $this->Template->load_form_row(array("title"=>"Embed code","input"=>$str_input_emb_code));
    $str_form_row_video .= $this->Template->load_form_row(array("title"=>"Mô tả","input"=>$str_input_des));
    $str_form_row_video .= 
        $this->Template->load_form_row(array("title"=>"","input"=>$str_save_button.$str_hidden_picture));

    //tao table
    $array_table_video_header = array(
        "num"           =>array("Stt",array("style"=>"width:1%;text-align:center")),
        "group_name"    =>array("Tên video",array("style"=>"width:1%;text-align:center")),
        "file"          =>array("Video",array("style"=>"width:1%;text-align:center")),
        "edit"              =>array("Sửa",array("style"=>"width:1%;text-align:center")),
        "delete"            =>array("Xóa",array("style"=>"width:1%;text-align:center"))
    );

    $str_table_video_header = $this->Template->load_table_header($array_table_video_header);

    $str_table_video_row = "";
    if($array_video != null)
    {
        $stt = 0;
        foreach($array_video as $video)
        {
            $stt++;
            $array_table_video_row = null;
            $array_table_video_row["num"] = array($stt,array("text-align:center"));
            $array_table_video_row["group_name"] = array($video["group_name"],array("text-align:center"));
            $array_table_video_row["file"] = array("<a href=".$video["file"].">Link</a>",array("text-align:center"));
            

            //tạo link sửa
            $str_link_edit = $this->Template->load_link("edit","Sửa","");
            $array_table_video_row["edit"] = array($str_link_edit,array("text-align:center"));
            //tạo link xóa
            $str_link_delete = $this->Template->load_link("del","Xóa","/picture/del_video/".$video["id"].".html");
            $array_table_video_row["delete"] = array($str_link_delete,array("text-align:center"));
            //gọi hàm $this->Template->load_table_row để tạo cặp thẻ <tr><td></td></tr> từ mảng $array_table_test_row

            $str_table_video_row .=  $this->Template->load_table_row($array_table_video_row,array("align"=>"center","id"=>"table_posts"));
        }
    }

    $str_table_video = $this->Template->load_table($str_table_video_header.$str_table_video_row,array("align"=>"center","id"=>"table_posts"));

    $str_load_form_video = $this->Template->load_form(array("method"=>"POST","action"=>"/picture/video/".$id.".html"),$str_form_row_video.$str_table_video);
    echo $str_load_form_video;

?>