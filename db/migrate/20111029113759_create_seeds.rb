class CreateSeeds < ActiveRecord::Migration
  def change
    create_table :seeds do |t|
      t.string :objectName, :null => false
      t.float :x, :null => false
      t.float :y, :null => false
      t.column :plantedTime, 'bigint', :null => false

      t.timestamps
    end
  end
end
