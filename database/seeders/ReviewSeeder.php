<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->delete();
        DB::table('reviews')->insert([
            ['avatar'=>'https://gcs.tripi.vn/public-tripi/tripi-feed/img/474015QSt/anh-gai-xinh-1.jpg', 'ho_va_ten'=>'Nguyễn Thị Thùy Dung', 'noi_dung'=>'Phòng ốc sạch sẽ, mình có chuyến công tác nên đã ghé đây 1 đêm trải nghịêm thử thì thấy khá ổn, nhân viên thân thịên. Còn về phần ăn sáng thì ngon mịêng nhưng mình múôn có thêm vài sự lựa chọn nữa. Khá hài lòng nên mình sẽ quay lại vào lần đến để ơe dài ngày hơn', 'sao_danh_gia'=>'4'],
            ['avatar'=>'https://japans.vn/wp-content/uploads/2023/07/avt-anh-gai-xinh-1.jpg', 'ho_va_ten'=>'Đặng Nữ Hoàng Ngân', 'noi_dung'=>'Khách sạn view đẹp, nhìn thẳng ra biển. Phòng đầy đủ tiện nghi, sạch sẽ. Phục vụ, chăm sóc khách hàng nhiệt tình. Nhân viên thân thiện, nhiệt tình. View tầng 17 đẹp, nhìn lên chùa linh ứng rất thích. Lần sau mình sec quay lại cùng giá đình.', 'sao_danh_gia'=>'5'],
            ['avatar'=>'https://i.pinimg.com/236x/6e/95/73/6e957302b674cb9e7501c0970d9f12eb.jpg', 'ho_va_ten'=>'Trần Ngọc Chi', 'noi_dung'=>'Đoàn mình đã ở khách sạn 3 đêm ở đây, mình cảm thấy rất hài lòng vè dịch vụ của khách sạn. Đồ ăn sáng ở tầng 16 rất ngon và đa dạng. Nhân viên ở đây rất niềm nở và thân thiện. Phòng mình ở rộng rãi, sạch sẽ. khi về mình sẽ giới thiệu với gia đình và bạn bè. lần sau sẽ ghé', 'sao_danh_gia'=>'5'],
            ['avatar'=>'https://channel.mediacdn.vn/thumb_w/640/428462621602512896/2023/6/30/photo-1-16881197336361069861409.jpg', 'ho_va_ten'=>'Trần Văn Nam', 'noi_dung'=>'Tôi hài lòng về phong cách chào đón của nhân viên, tuy nhiên sự niềm nở của nhân viên chưa thực sự tự nhiên, đặc biệt một số nhân viên bellman. Welcome drink của khách sạn khá ngon. Phòng ngủ tiện nghi, ấm cúng, thuận lợi để làm việc, nghỉ dưỡng. Buffet sáng chưa đa dạng và hấp dẫn.', 'sao_danh_gia'=>'3'],
            ['avatar'=>'https://kenh14cdn.com/2017/13-1493735677361.png', 'ho_va_ten'=>'Nguyễn Hoàng Nguyên', 'noi_dung'=>'Với mức giá ngang ngửa các khách sạn 5 sao khác,tôi hi vọng rằng sẽ có bồn tắm nhưng wc lại nhỏ và thiết kế chật hơn suy nghĩ rất nhiều.Thang máy chờ rất lâu tầm 10phut trở lên cho 1 lần đợi.Hồ bơi nhỏ.Bù lại thái độ nhân viên rất tốt và đồ ăn rất ngon.', 'sao_danh_gia'=>'2'],
            ['avatar'=>'https://intomau.com/Content/upload/images/anh-trai-deo-kinh-che-mat.jpg', 'ho_va_ten'=>'Võ Minh Tuấn', 'noi_dung'=>'Tôi có đến vào ngày 4/4/2021 có gửi hành lý cho bellboy nhưng khi tôi check out ,Các bộ phận không connect với nhau để lạc đồ khách gửi gây ra trễ chuyến bay của tôi !!!!! Bellboy và Reception không có sự bàn giao thông tin cho nhau , tôi rất không hài lòng. NEVER COME BACK ANYMORE !', 'sao_danh_gia'=>'1'],          
        ]);
    }
}
