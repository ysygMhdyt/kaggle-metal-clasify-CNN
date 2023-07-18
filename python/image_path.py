import os
import csv


with open('data.csv', 'w+', newline='', encoding='utf-8') as f:
    headers = ['image', 'target']
    csv_writer = csv.writer(f)
    csv_writer.writerow(headers)
    file_path = "../Data"
    class_names = os.listdir(file_path)

    for class_name in class_names:
        current_class_data_path = os.path.join(file_path, class_name)
        current_all_data = os.listdir(current_class_data_path)
        current_data_length = len(current_all_data)
        current_data_index_list = list(range(current_data_length))
        current_idx = 0

        for i in current_data_index_list:
            src_img_path = os.path.join(current_class_data_path, current_all_data[i])
            csv_writer.writerow([str(src_img_path), str(class_name)])
            current_idx = current_idx + 1
