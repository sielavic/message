<? if(!isset($timeLine['content']['polls']['answers_result'])){?>
                            <? if(!empty($timeLine['content']['discription'])) {
                                $name = mb_strimwidth($timeLine['content']['discription'], 0, 10, "...");
                                $timeLineRoom =  Entity\Room::where('work_id', $timeLine['id'])->get();
                                if (isset($timeLineRoom[0])){
                                    if ( !in_array($timeLine['id'], (array)$timeLineRoom[0]) ){
                                        $room = Entity\Room::create(['name' => $name, 'funder' => USER_COOKIE_ID, 'work_id' => $timeLine['id'], 'updated_at' => date('Y-m-d H:i:s')]);
                                        Entity\RoomUser::create(['room_id' => $room->id, 'user_id' => USER_COOKIE_ID]);
                                        $my_dialog = $room;
                                    }else{
                                        $room = $timeLineRoom[0];
                                        $my_dialog = $room;
                                    }
                                }else{
                                    $room = Entity\Room::create(['name' => $name, 'funder' => USER_COOKIE_ID, 'work_id' => $timeLine['id'], 'updated_at' => date('Y-m-d H:i:s')]);
                                    Entity\RoomUser::create(['room_id' => $room->id, 'user_id' => USER_COOKIE_ID]);
                                    $my_dialog = $room;
                                }
                            }?>
