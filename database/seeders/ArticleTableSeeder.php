<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_article = [
            [
                'ma_tloai' => "1",
                'tieude' => "Cảm ơn em đã rời xa anh",
                'ten_bhat' => "Vết mưa",
                'tomtat' => "Cảm ơn em đã cho anh những tháng ngày hạnh phúc, cho anh biết yêu và được yêu. Em cho anh được nếm trải hương vị ngọt ngào của tình yêu nhưng cũng đầy đau khổ và nước mắt. Những tháng ngày đó có lẽ suốt cuộc đời anh không bao giờ quên",
            ],
            [
                'ma_tloai' => "2",
                'tieude' => "Quê tôi!",
                'ten_bhat' => "Quê hương",
                'tomtat' => "Quê hương là gì mà chở đầy kí ức nhỏ xinh. Có đám trẻ nô đùa bên nhau dưới gốc ổi nhà bà Năm giữa trưa nắng gắt chỉ để chờ bà đi vắng là hái trộm. Có hai anh em tôi bì bõm lội sình bắt cua đem về nhà cho mẹ nấu canh, nấu cháo… Có ba chị em tôi lục đục tự nấu ăn khi mẹ vắng nhà. Có anh tôi luôn dắt tôi đi cùng đường ngõ xóm chỉ để em được vui. Có cả những trận cãi nhau nảy lửa của ba anh em nữa…",
            ],
            [
                'ma_tloai' => "3",
                'tieude' => "Đất nước",
                'ten_bhat' => "Đất nước",
                'tomtat' => "Đã bao nhiêu lần tôi tự hỏi: liệu trên Thế giới này có nơi nào chiến tranh tang thương mà lại rất đổi anh hùng như nước mình không? Liệu có mảnh đất nào mà mỗi tấc đất hôm nay đã thấm máu xương của những thế hệ đi trước nhiều như nước mình không? Và, liệu có một đất nước nào lại có nhiều bà mẹ đau khổ nhưng cũng hết sức gan góc như đất nước mình không?",
                'noidung' => "nội dung đất nước",
                // 'hinhanh' => "1"
            ],

        ];

        DB::table('articles')->delete(); //xóa tat ca bn ghi hien co trong bang

        foreach ($list_article as $article) {
            Article::insert($article);
        }
    }
}